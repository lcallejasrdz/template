<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WebContact as MasterModel;
use App\ViewWebContact as MasterViewModel;
use Sentinel;
use Redirect;
use Illuminate\Support\Facades\DB;

class WebContactsController extends Controller
{
    public function __construct() {
        $this->middleware('permissionsWebContact');
        
        $this->active = "contacts";
        $this->model = "WebContact";
        $this->select = [
            'id',
            'name',
            'email',
            'phone',
            'created_at'
        ];
        // 1 = all
        // 2 = only
        // 3 = exeptions
        $this->request_whit = 1;
        $this->only = [
        ];
        $this->exeptions = [
        ];
        $this->compact = ['word', 'active', 'model', 'view', 'columns', 'select', 'actions'];

        //Catalogs
        $this->catalog_state_id = DB::table('states')->pluck('name', 'id');
    }

    public function columns()
    {
        $columns = [
            trans('validation.attributes.id'),
            trans('validation.attributes.name'),
            trans('validation.attributes.email'),
            trans('validation.attributes.phone'),
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
        $actions = 5;

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
        $item = MasterViewModel::find($id);

        $active = $this->active;
        $word = trans('module_'.$this->active.'.module_title');

        return view('admin.show', compact($this->compact, 'item'));
    }
}
