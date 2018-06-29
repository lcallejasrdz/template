<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->active = "dashboard";
        $this->word = "Dashboard";
        $this->compact = ['word', 'active'];

        //Catalogs
    }

    public function index(){
        $active = $this->active;
        $word = $this->word;

        return view('admin.dashboard', compact($this->compact));
    }
}
