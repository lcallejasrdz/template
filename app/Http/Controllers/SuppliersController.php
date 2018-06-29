<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str as Str;
use App\Http\Requests\SuppliersRequest as MasterRequest;
use App\User as MasterModel;
use App\ViewSupplier as MasterViewModel;
use Sentinel;
use Activation;
use Redirect;
use Illuminate\Support\Facades\DB;
use File;
use Session;

use App\SupplierContact;

class SuppliersController extends Controller
{
    public function __construct() {
        $this->middleware('permissionsSupplier')->except('create', 'store');
        
        $this->active = "suppliers";
        $this->model = "Supplier";
        $this->select = [
            'id',
            'first_name',
            'last_name',
            'commercial_name',
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
            'logo',
            'constitutive_act',
            'hacienda_register',
            'legal_representative_identification',
            'address_proof'
        ];
        $this->compact = ['word', 'active', 'model', 'view', 'columns', 'select', 'actions', 'cart'];

        //Catalogs
        $this->catalog_gender_id = DB::table('genders')->pluck('name', 'id');
        $this->catalog_country_id = DB::table('countries')->pluck('name', 'id');
        $this->catalog_state_id = DB::table('states')->pluck('name', 'id');
        $this->catalog_city_id = DB::table('cities')->pluck('name', 'id');
        $this->catalog_person_type_id = DB::table('person_types')->pluck('name', 'id');
        $this->catalog_membership_id = DB::table('memberships')->pluck('name', 'id');
        $this->catalog_status_id = DB::table('statuses')->pluck('name', 'id');
    }

    public function columns()
    {
        $columns = [
            trans('validation.attributes.id'),
            trans('validation.attributes.first_name'),
            trans('validation.attributes.last_name'),
            trans('validation.attributes.commercial_name'),
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
        $catalog_country_id = $this->catalog_country_id;
        $catalog_state_id = $this->catalog_state_id;
        $catalog_city_id = $this->catalog_city_id;
        $catalog_person_type_id = $this->catalog_person_type_id;
        $catalog_membership_id = $this->catalog_membership_id;
        $catalog_status_id = $this->catalog_status_id;

        return view('auth.create', compact($this->compact, 'item', 'catalog_gender_id', 'catalog_country_id', 'catalog_state_id', 'catalog_city_id', 'catalog_person_type_id', 'catalog_membership_id', 'catalog_status_id'));
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

        $item = $this->addExtras($request, $item);

        $item->rfc = strtoupper($item->rfc);

        /* Slug */
        $item->slug = Str::slug($item->commercial_name);

        if($item->save()){
            $credentials = [
                'email'    => $request->email,
                'password' => $request->password
            ];

            if(Sentinel::authenticate($credentials)){
                return Redirect::to('admin/suppliers/'.Sentinel::getUser()->id)->with('success', trans('module_'.$this->active.'.crud.create.success'));
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
        $item = MasterViewModel::find($id);

        $active = $this->active;
        $word = trans('module_'.$this->active.'.module_title');

        // Catalogs
        $catalog_contacts = MasterModel::find($id)->contact;

        return view('admin.show', compact($this->compact, 'item', 'catalog_contacts'));
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
        $catalog_gender_id = $this->catalog_gender_id;
        $catalog_country_id = $this->catalog_country_id;
        $catalog_state_id = $this->catalog_state_id;
        $catalog_city_id = $this->catalog_city_id;
        $catalog_person_type_id = $this->catalog_person_type_id;
        $catalog_membership_id = $this->catalog_membership_id;
        $catalog_status_id = $this->catalog_status_id;
        $catalog_contacts = $item->contact;

        return view('admin.edit', compact($this->compact, 'item', 'catalog_gender_id', 'catalog_country_id', 'catalog_state_id', 'catalog_city_id', 'catalog_person_type_id', 'catalog_membership_id', 'catalog_status_id', 'catalog_contacts'));
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

        $item->rfc = strtoupper($request->rfc);

        /* Slug */
        $item->slug = Str::slug($item->commercial_name);

        if($item->save()){
            if(SupplierContact::where('user_id', $item->id)->count() == count($request->contact_first_name)){
                return Redirect::route($this->active)->with('success', trans('module_'.$this->active.'.crud.update.success'));
            }else{
                return Redirect::back()->with('error', trans('module_'.$this->active.'.crud.update.error'));
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

    /**
     * Update the specified extra resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteExtras($request, $item)
    {
        // Contacts
        SupplierContact::where('user_id', $item->id)->delete();
    }

    public function addExtras($request, $item)
    {
        // Upload logo
        if ($file = $request->file('logo')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/logos/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->logo)) {
                File::delete(public_path() . $folderName . $item->logo);
            }
        }else{
            if($item->logo != '' && $item->logo != null){
                $safeName = $item->logo;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->logo = $safeName;

        // Upload constitutive_act
        if ($file = $request->file('constitutive_act')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/documents/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->constitutive_act)) {
                File::delete(public_path() . $folderName . $item->constitutive_act);
            }
        }else{
            if($item->constitutive_act != '' && $item->constitutive_act != null){
                $safeName = $item->constitutive_act;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->constitutive_act = $safeName;

        // Upload hacienda_register
        if ($file = $request->file('hacienda_register')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/documents/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->hacienda_register)) {
                File::delete(public_path() . $folderName . $item->hacienda_register);
            }
        }else{
            if($item->hacienda_register != '' && $item->hacienda_register != null){
                $safeName = $item->hacienda_register;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->hacienda_register = $safeName;

        // Upload legal_representative_identification
        if ($file = $request->file('legal_representative_identification')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/documents/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->legal_representative_identification)) {
                File::delete(public_path() . $folderName . $item->legal_representative_identification);
            }
        }else{
            if($item->legal_representative_identification != '' && $item->legal_representative_identification != null){
                $safeName = $item->legal_representative_identification;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->legal_representative_identification = $safeName;

        // Upload address_proof
        if ($file = $request->file('address_proof')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/documents/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->address_proof)) {
                File::delete(public_path() . $folderName . $item->address_proof);
            }
        }else{
            if($item->address_proof != '' && $item->address_proof != null){
                $safeName = $item->address_proof;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->address_proof = $safeName;

        // Upload policies
        if ($file = $request->file('policies')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/suppliers/documents/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(40) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $item->policies)) {
                File::delete(public_path() . $folderName . $item->policies);
            }
        }else{
            if($item->policies != '' && $item->policies != null){
                $safeName = $item->policies;
            }else{
                $safeName = '';
            }
        }
        /* Update Item */
        $item->policies = $safeName;

        if($request->person_type_id != 1){
            $item->date_public_writing = '';
            $item->no_public_notary = '';
            $item->entity_public_notary = '';
            $item->inscription_folio = '';

            //delete old pic if exists
            $folderName = '/uploads/suppliers/documents/';
            if (File::exists(public_path() . $folderName . $item->constitutive_act)) {
                File::delete(public_path() . $folderName . $item->constitutive_act);
            }

            $item->constitutive_act = '';
        }else{
            $item->date_public_writing = $request->date_public_writing;
        }

        /* Contacts */
        for($i = 0; $i < count($request->contact_first_name); $i++){
            SupplierContact::create([
                'user_id' => $item->id,
                'first_name' => $request->contact_first_name[$i],
                'last_name' => $request->contact_last_name[$i],
                'job' => $request->contact_job[$i],
                'email' => $request->contact_email[$i],
                'phone' => $request->contact_phone[$i],
                'cellphone' => $request->contact_cellphone[$i]
            ]);
        }

        return $item;
    }
}
