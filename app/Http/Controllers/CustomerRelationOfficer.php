<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerRelationOfficer extends Controller
{
    public function index(){
        return view('dashboards/customerRelationOfficers/index');
    }
    public function profile(){
        return view('dashboards/customerRelationOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerRelationOfficers/settings');
    }
}
