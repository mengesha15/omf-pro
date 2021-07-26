<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    
    public function register()
    {
        return view('auth.register');
    }
}
