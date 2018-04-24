<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Provincia;
use App\Poblacion;
use App\Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); 
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30',
            'apellidos' => 'string|max:50|nullable',
            'fecha_nacimiento' => 'required',
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
            'sexo.*' => 'required|in:hombre,mujer',
            'direccion' => 'string|max:50|nullable',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
            'password' => 'required|string|min:6|confirmed',
            'dni' => array('required_if:nif,==,0','unique:users','regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0','unique:users','regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            //'sin' => 'nullable',
            'condiciones.*' => 'required|in:ok',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);

        return User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'nif' => $data['nif'],
            //'sin' => $data['sin'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'sexo' => $data['sexo'],
            'direccion' => $data['direccion'],
            'id_poblacion' => $data['poblacion'],
            'id_provincia' => $data['provincia'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
