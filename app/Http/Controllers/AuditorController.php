<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditorController extends Controller
{
    public function index(){
        return view('dashboards/auditors/index');
    }

     public function profile(){
        return view('dashboards/auditors/profile');
    }

     public function settings(){
        return view('dashboards/auditors/settings');
    }
}
