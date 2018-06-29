<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str as Str;
use App\Http\Requests\ProductsRequest as MasterRequest;
use App\Product as MasterModel;
use App\ViewProduct as MasterViewModel;
use Sentinel;
use Redirect;
use Illuminate\Support\Facades\DB;
use File;

use App\Subcategory;
use App\State;
use App\City;
use App\ProductEventType;
use App\ProductDateWithoutService;
use App\ProductCountry;
use App\ProductState;
use App\ProductCity;

class ProductsController extends Controller
{
    public function __construct() {
        $this->middleware('permissionsProduct');
        
        $this->active = "products";
        $this->model = "Product";
        $this->select = [
            'id',
            'name',
            'user_id',
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
            'event_type_id',
            'ubication',
            'dob',
            'country_id',
            'state_id',
            'city_id',
            'states_res',
            'cities_res',
            'days_without_service_from',
            'days_without_service_to',
            'dates_without_service_from',
            'dates_without_service_to'
        ];
        $this->compact = ['word', 'active', 'model', 'view', 'columns', 'select', 'actions'];

        //Catalogs
        $this->catalog_user_id = DB::table('users')->where('role_id', 4)->pluck('commercial_name', 'id');
        $this->catalog_category_id = DB::table('categories')->pluck('name', 'id');
        $this->catalog_subcategory_id = DB::table('subcategories')->pluck('name', 'id');
        $this->catalog_percent_buy_id = DB::table('percent_buys')->pluck('name', 'id');
        $this->catalog_product_unity_id = DB::table('product_unities')->pluck('name', 'id');
        $this->catalog_event_type_id = DB::table('event_types')->get();
        $this->catalog_product_type_id = DB::table('product_types')->pluck('name', 'id');
        $this->catalog_preparation_time_id = DB::table('preparation_times')->pluck('name', 'id');
        $this->catalog_restocked_time_id = DB::table('restocked_times')->pluck('name', 'id');
        $this->catalog_country_id = DB::table('countries')->get();
        $this->catalog_status_id = DB::table('statuses')->pluck('name', 'id');
    }

    public function columns()
    {
        $columns = [
            trans('validation.attributes.id'),
            trans('validation.attributes.name'),
            trans('validation.attributes.user_id'),
            trans('validation.attributes.status_id'),
            trans('validation.attributes.created_at'),
            trans('validation.attributes.actions')
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

        // Catalogs
        $catalog_user_id = $this->catalog_user_id;
        $catalog_category_id = $this->catalog_category_id;
        $catalog_subcategory_id = [];
        $catalog_percent_buy_id = $this->catalog_percent_buy_id;
        $catalog_product_unity_id = $this->catalog_product_unity_id;
        $catalog_event_type_id = $this->catalog_event_type_id;
        $catalog_product_type_id = $this->catalog_product_type_id;
        $catalog_preparation_time_id = $this->catalog_preparation_time_id;
        $catalog_restocked_time_id = $this->catalog_restocked_time_id;
        $catalog_country_id = $this->catalog_country_id;
        $catalog_state_id = [];
        $catalog_city_id = [];
        $catalog_status_id = $this->catalog_status_id;

        return view('admin.create', compact($this->compact,
                                                'catalog_user_id',
                                                'catalog_category_id',
                                                'catalog_subcategory_id',
                                                'catalog_percent_buy_id',
                                                'catalog_product_unity_id',
                                                'catalog_event_type_id',
                                                'catalog_product_type_id',
                                                'catalog_preparation_time_id',
                                                'catalog_restocked_time_id',
                                                'catalog_country_id',
                                                'catalog_state_id',
                                                'catalog_city_id',
                                                'catalog_status_id'
                                            ));
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

        /* Extras */
        $item = $this->addExtras($request, $item);

        /* Slug */
        $item->slug = Str::slug($item->name);

        if($item->save()){
            return Redirect::route($this->active)->with('success', trans('module_'.$this->active.'.crud.create.success'));
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
        $item = MasterViewModel::find($id);

        $active = $this->active;
        $word = trans('module_'.$this->active.'.module_title');

        // Catalogs
        $product_event_type = MasterModel::find($id)->eventType;
        $product_country = MasterModel::find($id)->country;
        $product_state = MasterModel::find($id)->state;
        $product_city = MasterModel::find($id)->city;
        $days_without_service = MasterModel::find($id)->daysWithoutService;

        return view('admin.show', compact($this->compact, 'item',
                                                            'product_event_type',
                                                            'product_country',
                                                            'product_state',
                                                            'product_city',
                                                            'days_without_service'
                                                        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MasterModel::find($id);

        $active = $this->active;
        $model = $this->model;
        $word = trans('module_'.$this->active.'.module_title');
        $columns = $this->columns();
        $select = $this->select;

        // Catalogs
        $catalog_user_id = $this->catalog_user_id;
        $catalog_category_id = $this->catalog_category_id;
        $catalog_subcategory_id = Subcategory::where('category_id', $item->category_id)->pluck('name', 'id');
        $catalog_percent_buy_id = $this->catalog_percent_buy_id;
        $catalog_product_unity_id = $this->catalog_product_unity_id;
        $catalog_event_type_id = $this->catalog_event_type_id;
        $catalog_product_type_id = $this->catalog_product_type_id;
        $catalog_preparation_time_id = $this->catalog_preparation_time_id;
        $catalog_restocked_time_id = $this->catalog_restocked_time_id;
        $catalog_country_id = $this->catalog_country_id;
        $catalog_state_id = State::
                                whereExists(function ($query) use($id) {
                                    $query->select(DB::raw(1))
                                          ->from('product_countries')
                                          ->whereRaw('product_countries.country_id = states.country_id')
                                          ->whereRaw('product_countries.product_id = '.$id);
                                })
                                ->get();
        $catalog_city_id = City::
                                whereExists(function ($query) use($id) {
                                    $query->select(DB::raw(1))
                                          ->from('product_states')
                                          ->whereRaw('product_states.state_id = cities.state_id')
                                          ->whereRaw('product_states.product_id = '.$id);
                                })
                                ->get();
        $catalog_status_id = $this->catalog_status_id;
        $catalog_date_without_service = MasterModel::find($id)->dateWithoutService;

        return view('admin.edit', compact($this->compact, 'item',
                                                'catalog_user_id',
                                                'catalog_category_id',
                                                'catalog_subcategory_id',
                                                'catalog_percent_buy_id',
                                                'catalog_product_unity_id',
                                                'catalog_product_type_id',
                                                'catalog_event_type_id',
                                                'catalog_preparation_time_id',
                                                'catalog_restocked_time_id',
                                                'catalog_country_id',
                                                'catalog_state_id',
                                                'catalog_city_id',
                                                'catalog_date_without_service',
                                                'catalog_status_id'
                                            ));
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
        $item = MasterModel::find($id);

        $this->deleteExtras($request, $item);
        $item = $this->addExtras($request, $item);

        /* Slug */
        $item->slug = Str::slug($item->name);

        if($item->save()){
			return Redirect::route($this->active)->with('success', trans('module_'.$this->active.'.crud.update.success'));
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

    /**
     * Update the specified extra resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteExtras($request, $item)
    {
        // Event Types
        ProductEventType::where('product_id', $item->id)->delete();

        // Countries
        ProductCountry::where('product_id', $item->id)->delete();

        // States
        ProductState::where('product_id', $item->id)->delete();

        // Cities
        ProductCity::where('product_id', $item->id)->delete();

        // Dates without service
        ProductDateWithoutService::where('product_id', $item->id)->delete();
    }

    public function addExtras($request, $item)
    {
        // Upload img_1
        if ($file = $request->file('img_1')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/products/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->img_1)) {
                File::delete(public_path() . $folderName . $item->img_1);
            }
        }else{
            if($item->img_1 != '' && $item->img_1 != null){
                $safeName = $item->img_1;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->img_1 = $safeName;

        // Upload img_2
        if ($file = $request->file('img_2')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/products/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->img_2)) {
                File::delete(public_path() . $folderName . $item->img_2);
            }
        }else{
            if($item->img_2 != '' && $item->img_2 != null){
                $safeName = $item->img_2;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->img_2 = $safeName;

        // Upload img_3
        if ($file = $request->file('img_3')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/products/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->img_3)) {
                File::delete(public_path() . $folderName . $item->img_3);
            }
        }else{
            if($item->img_3 != '' && $item->img_3 != null){
                $safeName = $item->img_3;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->img_3 = $safeName;

        // Upload img_4
        if ($file = $request->file('img_4')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/products/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->img_4)) {
                File::delete(public_path() . $folderName . $item->img_4);
            }
        }else{
            if($item->img_4 != '' && $item->img_4 != null){
                $safeName = $item->img_4;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->img_4 = $safeName;

        // Upload img_5
        if ($file = $request->file('img_5')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/products/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->img_5)) {
                File::delete(public_path() . $folderName . $item->img_5);
            }
        }else{
            if($item->img_5 != '' && $item->img_5 != null){
                $safeName = $item->img_5;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->img_5 = $safeName;

        // Event Types
        foreach($request->event_type_id as $event_type){
            ProductEventType::create([
                'product_id' => $item->id,
                'event_type_id' => $event_type
            ]);
        }

        // Countries
        foreach($request->country_id as $country){
            ProductCountry::create([
                'product_id' => $item->id,
                'country_id' => $country
            ]);
        }

        // States
        foreach($request->state_id as $state){
            ProductState::create([
                'product_id' => $item->id,
                'state_id' => $state
            ]);
        }

        // Cities
        foreach($request->city_id as $city){
            ProductCity::create([
                'product_id' => $item->id,
                'city_id' => $city
            ]);
        }

        // Dates without service
        if(isset($request->dates_without_service_from)){
            for($i = 0; $i < count($request->dates_without_service_from); $i++){
                ProductDateWithoutService::create([
                        'product_id' => $item->id,
                        'dates_without_service_from' => $request->dates_without_service_from[$i],
                        'dates_without_service_to' => $request->dates_without_service_to[$i],
                    ]);
            }
        }

        return $item;
    }
}
