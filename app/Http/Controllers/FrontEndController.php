<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Redirect;
use Sentinel;
use Session;
use App\Product;
use App\ViewProduct;
use App\ViewService;
use App\ProductModule;
use App\Status;
use App\WebContact;
use App\SendMail;

class FrontEndController extends Controller
{
    public function __construct()
    {
        if(!Session::has('cart')) Session::put('cart', array());

        $this->compact = ['active', 'cart'];

        //Catalogs
        $this->catalog_country_id = DB::table('countries')->pluck('name', 'id');
        $this->catalog_state_id = DB::table('states')->pluck('name', 'id');
        $this->catalog_city_id = DB::table('cities')->pluck('name', 'id');
    }

    /*
     * Website
     */
    public function index(){
    	$active = 'index';
    	$cart = Session::get('cart');

    	return view('index', compact($this->compact));
    }

    public function getContact(){
        $active = 'contact';
        $cart = Session::get('cart');

        return view('website.contact', compact($this->compact));
    }

    public function postContact(Request $request){
        $item = WebContact::create($request->all());

        if($item){
            // Send mails.
            SendMail::createMailContact($request);
            SendMail::createMailContactAdmin($request);

            return Redirect::back()->with('success', trans('contact.send_mail.success'));
        }

        return Redirect::back()->with('error', trans('contact.send_mail.error'));
    }

    /*
     * Purchases
     */
    public function search(){
    	$active = 'search';
    	$cart = Session::get('cart');

    	$products = Product::where('status_id', 1);
    	$products = $products->paginate(12);

    	return view('purchases.search', compact($this->compact, 'products'));
    }

    public function detail(Request $request){
    	$active = 'detail';
    	$cart = Session::get('cart');

        $module = ProductModule::find(Product::where('slug', $request->slug)->first()->product_module_id);
        if($module->id == 1){
            $item = ViewProduct::where('product_module_id', $module->name)->where('slug', $request->slug)->first();
        }else{
            $item = ViewService::where('product_module_id', $module->name)->where('slug', $request->slug)->first();
        }

        $supplier = Sentinel::findById(Product::where('slug', $request->slug)->first()->user_id);

    	return view('purchases.detail', compact($this->compact, 'item', 'supplier'));
    }

    public function cart(){
    	$active = 'cart';
    	$cart = Session::get('cart');

        if(count($cart) <= 0){
            return Redirect::back();
        }

    	return view('purchases.cart', compact($this->compact));
    }

    public function confirmPurchase(){
        $active = 'confirm-purchase';
        $cart = Session::get('cart');

        // Catalogs
        $catalog_country_id = $this->catalog_country_id;
        $catalog_state_id = $this->catalog_state_id;
        $catalog_city_id = $this->catalog_city_id;

        return view('purchases.confirm-purchase', compact($this->compact, 'catalog_country_id', 'catalog_state_id', 'catalog_city_id'));
    }

    // public function getPurchases(){
    //     $active = 'my-purchases';
    //     $cart = Session::get('cart');

    //     return view('purchases.my-purchases', compact($this->compact));
    // }
}
