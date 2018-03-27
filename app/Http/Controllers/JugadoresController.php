<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\User;

use App\Nivel;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class JugadoresController extends Controller
{
    
    public function index(){
 
        $title = 'Listado de jugadores';

        $jugadores = User::all()->where('id_rol', 3); 

        return view('jugadores.index', compact('title','jugadores'));
    }

    public function show(User $jugador){

        return view('jugadores.show', compact('jugador'));
    }

    public function create(){

        $niveles = Nivel::all();

    	return view('jugadores.create', compact('empleado', 'niveles'));
    }

    public function store(){

        $data = request()->validate([

            'name' => 'required', // campo cual debe de ser requerido
            'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => ['required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
            'telefono' => ['required', 'min:9', 'max:9'],
            'password' => ['required', 'min:6'],
            'c_postal' => '',
            //'c_postal' => ['','max:5', 'min:4'],
            'niveles' => 'required',

        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'dni.required' => 'El campo DNI es obligatiorio',
            'dni.min' => 'El campo DNI debe contener 8 dígitos y 1 letra',
            'dni.unique' => 'Este dni ya existe en la base de datos',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Tiene que escribir un email correcto (ejemplo@ejemplo.com)',
            'email.unique' => 'Este email ya existe en la base de datos, introduzca uno diferente',
            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.min' => 'El telefono debe contener 9 dígitos',
            'niveles.required' => 'El campo niveles es obligatorio',
            //'c_postal.max' => 'Debe contener 5 digitos el campo codigo postal',
            //'c_postal.min' => 'Debe contener almenos 4 digitos el campo codigo postal',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
        ]);

        User::create([

            'name' => $data['name'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => bcrypt($data['password']),
            'id_rol' => 3,
            'id_nivel' => $data['niveles'],
            'c_postal' => 03500,

        ]);

        //return redirec('usuarios');
        return redirect()->route('jugadores.index');

    }

    public function edit(User $jugador){

        $niveles = Nivel::all();
    	
        return view('jugadores.edit', ['jugador' => $jugador , 'niveles' => $niveles]);
    }

    public function update(User $jugador){

        $data = request()->validate([

            'name' => 'required', // campo cual debe de ser requerido
            //'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($jugador->id)
            ],
            //'email' => ['required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
            'telefono' => ['required', 'min:9'],
            'niveles' => 'required',
            'c_postal' => 'max:5',
            'password' => '',
            'apellidos' => '',
            'direccion' => '',
            'poblacion' => '',
            'provincia' => '',
            'dni' => [
                'required',
                'min:9', 
                Rule::unique('users')->ignore($jugador->id)
            ],
            'niveles' => 'required',
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
            'dni.required' => 'El campo DNI es obligatiorio',
            'dni.min' => 'El campo DNI debe contener 8 dígitos y 1 letra',
            'dni.unique' => 'Este dni ya existe en la base de datos',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Tiene que escribir un email correcto (ejemplo@ejemplo.com)',
            //'email.unique' => 'Este email ya existe en la base de datos, introduzca uno diferente',
            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.min' => 'El telefono debe contener 9 dígitos',
            'niveles.required' => 'El campo nivel es obligarotio',
            'c_postal.max' => 'El código postal debe contener 5 digitos',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
            'niveles.required' => 'El campo de nivel es obligatorio',
        ]);



        if ($data['password'] != null) {

            $data = request()->validate([

                'name' => 'required', // campo cual debe de ser requerido
                //'dni' => ['required', 'min:9','unique:users,dni'],
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($jugador->id)
                ],
                //'email' => ['','required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
                'telefono' => ['required', 'min:9'],
                'niveles' => '',
                'c_postal' => 'max:5',
                'password' => ['required', 'min:6'],
                'apellidos' => '',
                'direccion' => '',
                'poblacion' => '',
                'provincia' => '',
                'dni' => [
                    'required',
                    'min:9', 
                    Rule::unique('users')->ignore($jugador->id)
                ],
                'niveles' => 'required',
            ],
            [
                'name.required' => 'El campo nombre es obligatorio',
                'dni.required' => 'El campo DNI es obligatiorio',
                'dni.min' => 'El campo DNI debe contener 8 dígitos y 1 letra',
                'dni.unique' => 'Este dni ya existe en la base de datos',
                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'Tiene que escribir un email correcto (ejemplo@ejemplo.com)',
                'email.unique' => 'Este email ya existe en la base de datos, introduzca uno diferente',
                'telefono.required' => 'El campo telefono es obligatorio',
                'telefono.min' => 'El telefono debe contener 9 dígitos',
                'c_postal.max' => 'El código postal debe contener 5 digitos',
                'password.required' => 'El campo password es obligatorio',
                'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
                'niveles.required' => 'El campo de nivel es obligatorio',
            ]);


            $jugador->id_nivel = $data['niveles'];
            $data['password'] = bcrypt($data['password']);
            $jugador->update($data);
          
        }else{
            $jugador->id_nivel = $data['niveles'];
            unset($data['password']);
            $jugador->update($data);
        }

        return redirect()->route('jugadores.show', ['user' => $jugador]);
    }

    public function destroy(User $jugador){

        $jugador->delete();

        return redirect()->route('jugadores.index');
    }
}
