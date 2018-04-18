<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\User;

use App\Nivel;
use App\Provincia;
use App\Poblacion;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class JugadoresController extends Controller
{
    
    public function index(){
 
        $title = 'Listado de jugadores';

        $jugadores = User::where('id_rol', 3)->paginate(10); 

        return view('jugadores.index', compact('title','jugadores'));
    }

    public function show(User $jugador){

        return view('jugadores.show', compact('jugador'));
    }

    public function create(){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();


        $niveles = Nivel::all();
        
        return view('jugadores.create', ['niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones]);
    }

    public function store(){

        $data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            'dni' => array('required_if:nif,==,0','unique:users','regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0','unique:users','regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'email' => ['required','email','unique:users'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
            //'telefono' => ['required', 'min:9', 'unique:users,telefono'],
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
            'password' => ['required', 'min:6'],
            'niveles' => 'required',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
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
            'telefono.unique' => 'El telefono introducido ya existe en la base de datos',
            'niveles.required' => 'El campo niveles es obligatorio',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
        ]);

        User::create([

            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'password' => bcrypt($data['password']),
            'id_rol' => 3,
            'id_nivel' => $data['niveles'],
            'id_provincia' => $data['provincia'],
            'id_poblacion' => $data['poblacion'],

        ]);

        //return redirec('usuarios');
        return redirect()->route('jugadores.index');

    }

    public function edit(User $jugador){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();


        $niveles = Nivel::all();
        
        return view('jugadores.edit', ['jugador' => $jugador ,'niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones]);
    }

    public function update(User $jugador){

         $data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            //'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($jugador->id)
            ],
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($jugador->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
            'dni' => array('required_if:nif,==,0','unique:users','regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0','unique:users','regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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
            'telefono.unique' => 'El telefono introducido ya existe en la base de datos',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
            'niveles.required' => 'El campo de nivel es obligatorio',
        ]);



        if ($data['password'] != null) {

            $data = request()->validate([

                'name' => 'required|string|max:20', // campo cual debe de ser requerido
                //'dni' => ['required', 'min:9','unique:users,dni'],
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($jugador->id)
                ],
                'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
                'password' => ['required', 'min:6'],
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                'poblacion' => 'min:1',
                'provincia' => 'min:1',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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
                'telefono.unique' => 'El telefono introducido ya existe en la base de datos',
                'password.required' => 'El campo password es obligatorio',
                'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
                'niveles.required' => 'El campo de nivel es obligatorio',
            ]);

            $jugador->id_poblacion = $data['poblacion'];
            $jugador->id_provincia = $data['provincia'];            
            $jugador->id_nivel = $data['niveles'];
            $data['password'] = bcrypt($data['password']);
            $jugador->update($data);
          
        }else{
            $jugador->id_poblacion = $data['poblacion'];
            $jugador->id_provincia = $data['provincia'];
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
