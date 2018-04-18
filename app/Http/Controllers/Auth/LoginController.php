<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



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

    // funcion para poder enviar al usuario dependiendo de su rol a un sitio u otro
    public function redirectPath(){

        if (auth()->user()->id_rol == 1) {

            return '/admin';

        }elseif (auth()->user()->id_rol == 2) {

            return '/admin';

        }elseif (auth()->user()->id_rol == 3) {

            return '/home';            

        }else{

            return '/';

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
}
