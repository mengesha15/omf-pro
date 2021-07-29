<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if(Auth::guard($guard)->check() && Auth::user()->user_role == "Admin"){
                return redirect()->route('admin.dashboard');
            }
            elseif(Auth::guard($guard)->check() && Auth::user()->user_role == "Auditor"){
                return redirect()->route('auditor.dashboard');
            }
            elseif(Auth::guard($guard)->check() && Auth::user()->user_role == "Customer relation officer"){
                return redirect()->route('customerRelationOfficer.dashboard');
            }
            elseif(Auth::guard($guard)->check() && Auth::user()->user_role == "Customer service officer"){
                return redirect()->route('customerServiceOfficer.dashboard');
            }
        }

        return $next($request);
    }
}
