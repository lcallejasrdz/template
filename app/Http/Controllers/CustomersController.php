<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str as Str;
use App\Http\Requests\CustomersRequest as MasterRequest;
use App\User as MasterModel;
use App\ViewCustomer as MasterViewModel;
use Sentinel;
use Activation;
use Redirect;
use Illuminate\Support\Facades\DB;
use File;
use Session;

class CustomersController extends Controller
{
    public function __construct() {
        $this->middleware('permissionsCustomer')->except('create', 'store');
        
        $this->active = "customers";
        $this->model = "Customer";
        $this->select = [
            'id',
            'first_name',
            'last_name',
            'email',
            'status_id',
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
        $this->catalog_gender_id = DB::table('genders')->pluck('name', 'id');
        $this->catalog_status_id = DB::table('statuses')->where('id', '<', 3)->pluck('name', 'id');
    }

    public function columns()
    {
        $columns = [
            trans('validation.attributes.id'),
            trans('validation.attributes.first_name'),
            trans('validation.attributes.last_name'),
            trans('validation.attributes.email'),
            trans('validation.attributes.status_id'),
            trans('validation.attributes.created_at'),
            trans('validation.attributes.actions'),
        ];

        return $columns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if(Sentinel::getUser()->role_id <= 2){
            $actions = 1;
        }else{
            $actions = 5;
        }

        return view('admin.index', compact($this->compact));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = $this->active;
        $model = $this->model;
        $word = trans('module_'.$this->active.'.module_title');
        $columns = $this->columns();
        $select = $this->select;
        $cart = Session::get('cart');

        // Catalogs
        $catalog_gender_id = $this->catalog_gender_id;
        $catalog_status_id = $this->catalog_status_id;

        return view('auth.create', compact($this->compact, 'item', 'catalog_gender_id', 'catalog_status_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterRequest $request)
    {
        /* Create Item */
        if($this->request_whit == 1){
            $item = MasterModel::create($request->all());
        }else if($this->request_whit == 2){
            $item = MasterModel::create($request->only($this->only));
        }else{
            $item = MasterModel::create($request->except($this->exeptions));
        }

        $user = Sentinel::findById($item->id);
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        /* Extras */
        $role = Sentinel::findRoleById($request->role_id);
        $role->users()->attach($item);

        /* Slug */
        $item->slug = Str::slug($item->first_name.' '.$item->last_name.' '.$item->id);

        if($item->save()){
            $credentials = [
                'email'    => $request->email,
                'password' => $request->password
            ];

            if(Sentinel::authenticate($credentials)){
                return Redirect::to('my-account/'.Sentinel::getUser()->slug)->with('success', trans('module_'.$this->active.'.crud.create.success'));
            }else{
                return Redirect::route('login')->with('error', trans('auth.crud.login.error'));
            }
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.create.error'));
        }
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
            $item = MasterViewModel::find(Sentinel::getUser()->id);

            $active = 'my-account';
            $cart = Session::get('cart');

            return view('auth.show', compact($this->compact, 'item'));
        }else{
            $item = MasterViewModel::find($id);
            
            $active = $this->active;
            $word = trans('module_'.$this->active.'.module_title');
            $cart = Session::get('cart');

            return view('admin.show', compact($this->compact, 'item'));
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
        // Catalogs
        $catalog_gender_id = $this->catalog_gender_id;
        $catalog_status_id = $this->catalog_status_id;

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
            $cart = Session::get('cart');

            return view('admin.edit', compact($this->compact, 'item', 'catalog_gender_id', 'catalog_status_id'));
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

        /* Slug */
        $item->slug = Str::slug($item->first_name.' '.$item->last_name.' '.$item->id);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(MasterModel::destroy($request->id)){
            return Redirect::route($this->active)->with('success', trans('module_'.$this->active.'.crud.delete.success'));
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.delete.error'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRestore()
    {
        $active = $this->active;
        $model = $this->model;
        $view = 'delete';
        $word = trans('module_'.$this->active.'.module_title');
        $columns = $this->columns();
        $select = $this->select;
        $actions = 1;

        return view('admin.deleted', compact($this->compact));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postRestore(Request $request)
    {
        $item = MasterModel::onlyTrashed()->find($request->id);

        if($item->restore()){
            return Redirect::route($this->active.'.deleted')->with('success', trans('module_'.$this->active.'.crud.restore.success'));
        }else{
            return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.restore.error'));
        }
    }
}
