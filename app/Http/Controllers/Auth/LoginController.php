<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role_id = "1") {
            return route('admin.dashboard');
        } elseif (Auth()->user()->role_id = "2") {
            return route('auditor.dashboard');
        } elseif (Auth()->user()->role_id = "3") {
            return route('customerRelationOfficer.dashboard');
        } elseif (Auth()->user()->role_id = "4") {
            return route('customerServiceOfficer.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {

            if (auth()->user()->role_id = 1) {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role_id = 2) {
                return redirect()->route('auditor.dashboard');
            } elseif (auth()->user()->role_id = 3) {
                return redirect()->route('customerRelationOfficer.dashboard');
            } elseif (auth()->user()->role_id = 4) {
                return redirect()->route('customerServiceOfficer.dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email and passworsd are wrong');
        }
    }

    public function username()
    {
        return 'username';
    }
}
