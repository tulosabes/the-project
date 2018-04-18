<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
        
            return redirect('/login');
        
        }else if (Auth::guard($guard)->check() && Auth::user()->id === 1) {
        
            return redirect('/admin');
        
        }else if (Auth::guard($guard)->check() && Auth::user()->id === 2) {
        
            return redirect('/admin');
        
        }else if (Auth::guard($guard)->check() && Auth::user()->id === 3) {
        
            return redirect('/home');
        
        }

        return $next($request);
    }
}

/*
if (Auth::guard($guard)->check() && Auth::user()->id == 1) {
         
            return redirect('/admin');
        
        }else if (Auth::guard($guard)->check() && Auth::user()->id == 2) {
            
            return redirect('/admin');

        }else if (Auth::guard($guard)->check() && Auth::user()->id == 3) {
            
            return redirect('/home');

        }else if (Auth::guard($guard)->check()){

            return redirect('/login');
        
        }else{

            return redirect('/login');
        }
*/
