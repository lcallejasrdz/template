<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\PayPalConnectionException;
use PayPal\Api\Transaction;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Agreement;
use PayPal\Api\ShippingAddress;

use URL;
use Session;
use Config;
use Redirect;
use Sentinel;
use Illuminate\Support\Facades\Input;
use App\Sale;
use App\SaleItem;
use App\ViewSaleItem;
use App\SendMail;

class PayPalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** setup PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        if(!Session::has('cart')) Session::put('cart', array());
        if(!Session::has('data')) Session::put('data', array());
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        // Get cart
        $cart = Session::get('cart');

        // If cart is empty then return back
        if(count($cart) == 0){
            return Redirect::back()->with('error', trans('paypal.cart_empty'));
        }

        $dataorder = new \stdClass();
        $dataorder->payment_type_id = 1;
        $dataorder->country_id = $request->country_id;
        $dataorder->state_id = $request->state_id;
        $dataorder->city_id = $request->city_id;
        $dataorder->municipality = $request->municipality;
        $dataorder->colony = $request->colony;
        $dataorder->street = $request->street;
        $dataorder->no_ext = $request->no_ext;
        $dataorder->no_int = $request->no_int;
        $dataorder->postal_code = $request->postal_code;
        Session::put('data', $dataorder);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $currency = env('PAYPAL_CURRENCY');
        $total_cart = 0;
        $subtotal = 0;

        $items = array();
        foreach ($cart as $product) {
            $item = new Item();
            $item->setName($product['name'])
            ->setCurrency($currency)
            ->setQuantity($product['quantity'])
            ->setPrice($product['price']);

            $items[] = $item;

            $subtotal += $product['quantity'] * $product['price'];
        }

        $item_list = new ItemList();
        $item_list->setItems($items);

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($subtotal);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription(trans('paypal.sale_description'));

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment-paypal-status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('cart'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                return Redirect::route('cart')->with('error', trans('paypal.not_response'));
            } else {
                return Redirect::route('cart')->with('error', trans('paypal.error_unknow'));
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        return Redirect::route('cart')->with('error', trans('paypal.error_unknow'));
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', trans('paypal.error_payment'));
            return Redirect::route('cart');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
        	// Save Sale and Send Mails
            $id = $this->saveSale();
            $this->sendMails($id);
            // Delete Session variables.
            Session::forget('cart');
            Session::forget('data');

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            return Redirect::route('home')->with('success', trans('paypal.success_payment'));
        }
        return Redirect::route('cart')->with('error', trans('paypal.error_payment'));
    }

    public function saveSale(){
        $cart = Session::get('cart');
        $data = Session::get('data');

        $subtotal = 0;

        $sale = Sale::create([
            'user_id' => Sentinel::getUser()->id,
            'payment_type_id' => $data->payment_type_id,
            'total' => $subtotal,
            'country_id' => $data->country_id,
            'state_id' => $data->state_id,
            'city_id' => $data->city_id,
            'municipality' => $data->municipality,
            'colony' => $data->colony,
            'street' => $data->street,
            'no_ext' => $data->no_ext,
            'no_int' => $data->no_int,
            'postal_code' => $data->postal_code
        ]);

        if(isset($cart)){
            foreach ($cart as $product) {
                $sale_item = SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product['id'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'token' => str_random(40),
                    'sale_status_id' => 1
                ]);

                $subtotal += $product['quantity'] * $product['price'];
            }
        }

        $sale->total = $subtotal;

        $sale->save();

        return $sale->id;
    }

    public function sendMails($id){
        $sale = Sale::find($id);
        $items = ViewSaleItem::where('sale_id', $id)->get();
        $customer = Sentinel::getUser();

        // Send mails.
        SendMail::createMailSale($sale, $items, $customer);
        SendMail::createMailSaleAdmin($sale, $items, $customer);
    }
}
