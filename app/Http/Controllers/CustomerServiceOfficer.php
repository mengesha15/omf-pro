<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerServiceOfficer extends Controller
{
    public function index(){
        return view('dashboards/customerServiceOfficers/index');
    }
    public function profile(){
        return view('dashboards/customerServiceOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerServiceOfficers/settings');
    }
}
