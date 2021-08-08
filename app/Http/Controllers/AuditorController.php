<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuditorController extends Controller
{
    public function index(){
        $user = User::all();
        return view('dashboards/auditors/index');
    }

     public function profile(){
        return view('dashboards/auditors/profile');
    }

     public function settings(){
        return view('dashboards/auditors/settings');
    }
}
