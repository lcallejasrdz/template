<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SalesRequest as MasterRequest;
use App\Sale as MasterModel;
use App\ViewSale as MasterViewModel;
use Sentinel;
use Redirect;
use Illuminate\Support\Facades\DB;
use Session;

use App\State;
use App\City;
use App\SaleItem;
use App\ViewSaleItem;
use App\SendMail;

class SalesController extends Controller
{
    public function __construct() {
        $this->middleware('permissionsSale');

        if(!Session::has('cart')) Session::put('cart', array());
        
        $this->active = "sales";
        $this->model = "Sale";
        $this->select = [
            'id',
            'user_id',
            'payment_type_id',
            'total',
            'created_at'
        ];
        // 1 = all
        // 2 = only
        // 3 = exeptions
        $this->request_whit = 3;
        $this->only = [
        ];
        $this->exeptions = [
            'password_confirm',
        ];
        $this->compact = ['word', 'active', 'model', 'view', 'columns', 'select', 'actions', 'cart'];

        //Catalogs
        $this->catalog_country_id = DB::table('countries')->pluck('name', 'id');
    }

    public function columns()
    {
        if(Sentinel::getUser()->role_id == 5){
            $columns = [
                trans('validation.attributes.id'),
                trans('validation.attributes.payment_type_id'),
                trans('validation.attributes.total'),
                trans('validation.attributes.created_at'),
                trans('validation.attributes.actions'),
            ];
        }else{
            $columns = [
                trans('validation.attributes.id'),
                trans('validation.attributes.customer'),
                trans('validation.attributes.payment_type_id'),
                trans('validation.attributes.total'),
                trans('validation.attributes.created_at'),
                trans('validation.attributes.actions'),
            ];
        }

        return $columns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Sentinel::getUser()->role_id <= 2 || Sentinel::getUser()->role_id <= 4){
            $active = $this->active;
            $model = $this->model;
            $view = 'index';
            $word = trans('module_'.$this->active.'.module_title');
            $columns = $this->columns();
            $select = $this->select;
            // 1 = (show, edit, delete)
            // 2 = (show, edit)
            // 3 = (show, delete)
            // 4 = (edit, delete)
            // 5 = (show)
            // 6 = (edit)
            // 7 = (delete)
            $actions = 2;
        }else if(Sentinel::getUser()->role_id == 5){
            $active = 'my-purchases';
            $model = $this->model;
            $view = 'index';
            $word = trans('module_'.$this->active.'.module_title');
            $columns = $this->columns();
            $select = [
                'id',
                'payment_type_id',
                'total',
                'created_at'
            ];;
            // 1 = (show, edit, delete)
            // 2 = (show, edit)
            // 3 = (show, delete)
            // 4 = (edit, delete)
            // 5 = (show)
            // 6 = (edit)
            // 7 = (delete)
            $actions = 5;
            $cart = Session::get('cart');

            return view('purchases.my-purchases', compact($this->compact));
        }else{
            $active = $this->active;
            $model = $this->model;
            $view = 'index';
            $word = trans('module_'.$this->active.'.module_title');
            $columns = $this->columns();
            $select = $this->select;
            // 1 = (show, edit, delete)
            // 2 = (show, edit)
            // 3 = (show, delete)
            // 4 = (edit, delete)
            // 5 = (show)
            // 6 = (edit)
            // 7 = (delete)
            $actions = 5;
        }

        return view('admin.index', compact($this->compact));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Sentinel::getUser()->role_id == 5){
            $item = MasterViewModel::find($id);

            $active = 'purchase-detail';
            $cart = Session::get('cart');

            /* Extras */
            $products = MasterModel::find($id)->saleItem;

            return view('purchases.purchase-detail', compact($this->compact, 'item', 'products'));
        }else{
            $item = MasterViewModel::find($id);
            
            $active = $this->active;
            $word = trans('module_'.$this->active.'.module_title');

            /* Extras */
            $user = Sentinel::getUser();
            if($user->role_id == 4){
                $products = ViewSaleItem::where('sale_id', $id)
                                    ->whereExists(function ($query) use ($user, $id) {
                                        $query->select(DB::raw(1))
                                              ->from('sale_items')
                                              ->whereRaw('sale_items.id = view_sale_items.id')
                                              ->whereExists(function ($query) use ($user) {
                                                $query->select(DB::raw(1))
                                                      ->from('products')
                                                      ->whereRaw('products.id = sale_items.product_id')
                                                      ->whereRaw('products.user_id = '.$user->id);
                                            });
                                    })
                                    ->get();
            }else{
                $products = MasterModel::find($id)->saleItem;
            }

            return view('admin.show', compact($this->compact, 'item', 'products'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Sentinel::getUser()->role_id == 5){
            $item = MasterModel::find(Sentinel::getUser()->id);

            $active = 'edit-my-account';
            $cart = Session::get('cart');

            return view('auth.edit', compact($this->compact, 'item', 'catalog_gender_id', 'catalog_status_id'));
        }else{
            $item = MasterModel::find($id);

            $active = $this->active;
            $model = $this->model;
            $word = trans('module_'.$this->active.'.module_title');
            $columns = $this->columns();
            $select = $this->select;

            // Catalogs
	        $catalog_country_id = $this->catalog_country_id;
	        $catalog_state_id = State::
	                                whereExists(function ($query) use($id) {
	                                    $query->select(DB::raw(1))
	                                          ->from('sales')
	                                          ->whereRaw('sales.country_id = states.country_id')
	                                          ->whereRaw('sales.id = '.$id);
	                                })
	                                ->pluck('name', 'id');
	        $catalog_city_id = City::
	                                whereExists(function ($query) use($id) {
	                                    $query->select(DB::raw(1))
	                                          ->from('sales')
	                                          ->whereRaw('sales.state_id = cities.state_id')
	                                          ->whereRaw('sales.id = '.$id);
	                                })
	                                ->pluck('name', 'id');

            /* Extras */
            $user = Sentinel::getUser();
            if($user->role_id == 4){
                $products = ViewSaleItem::where('sale_id', $id)
                                    ->whereExists(function ($query) use ($user, $id) {
                                        $query->select(DB::raw(1))
                                              ->from('sale_items')
                                              ->whereRaw('sale_items.id = view_sale_items.id')
                                              ->whereExists(function ($query) use ($user) {
                                                $query->select(DB::raw(1))
                                                      ->from('products')
                                                      ->whereRaw('products.id = sale_items.product_id')
                                                      ->whereRaw('products.user_id = '.$user->id);
                                            });
                                    })
                                    ->get();
            }else{
                $products = MasterModel::find($id)->saleItem;
            }

            return view('admin.edit', compact($this->compact, 'item', 'products', 'catalog_country_id', 'catalog_state_id', 'catalog_city_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MasterRequest $request, $id)
    {
        $item = MasterModel::find($id);

        if($this->request_whit == 1){
            $item->fill($request->all());
        }else if($this->request_whit == 2){
            $item->fill($request->only($this->only));
        }else{
            $item->fill($request->except($this->exeptions));
        }

        /*
         * Extras
         */

        if($item->save()){
            if(Sentinel::getUser()->role_id == 5){
                return Redirect::back()->with('success', trans('module_'.$this->active.'.crud.update.success'));
            }else{
                return Redirect::route($this->active)->with('success', trans('module_'.$this->active.'.crud.update.success'));
            }
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.update.error'));
        }
    }

    /**
     * Update the status resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $item = SaleItem::find($request->id);

        if($item->sale_status_id < 3){
            $item->sale_status_id = $item->sale_status_id + 1;
        }

        /*
         * Extras
         */

        if($item->save()){
            $sale = MasterModel::find($item->sale_id);
            $item = ViewSaleItem::find($item->id);
            $customer = Sentinel::findById($sale->user_id);

            // Send mails.
            SendMail::createMailUpdateStatusItem($sale, $item, $customer);

            return Redirect::back()->with('success', trans('module_'.$this->active.'.crud.update-status.success'));
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.update-status.error'));
        }
    }

    /**
     * Update the status resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelItem(Request $request)
    {
        $item = SaleItem::find($request->id);

        if($item->sale_status_id < 3){
            $item->sale_status_id = 5;
        }

        /*
         * Extras
         */

        if($item->save()){
            $sale = MasterModel::find($item->sale_id);
            $items = ViewSaleItem::where('sale_id', $sale->id)->get();
            $customer = Sentinel::findById($sale->user_id);

            // Send mails.
            SendMail::createMailItemCanceled($sale, $items, $customer);
            SendMail::createMailItemCanceledAdmin($sale, $items, $customer);

            return Redirect::back()->with('success', trans('module_'.$this->active.'.crud.update-status.success'));
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.update-status.error'));
        }
    }
}
