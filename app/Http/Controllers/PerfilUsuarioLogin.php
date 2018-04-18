<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Provincia;
use App\Poblacion;
use App\Nivel;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class PerfilUsuarioLogin extends Controller
{
    

	public function index(){

		$title = 'Bienvenido a tu perfil de usuario';

		$admin = auth()->user();

		return view('perfiles.index', compact('title', 'admin'));
 
	}

	public function show(User $admin){

		return redirect()->route('perfiles.index');
	}

	public function edit(User $admin){

		$provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();

        $niveles = Nivel::all();

        $admin = auth()->user();
        
        return view('perfiles.edit', ['admin' => $admin ,'niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones]);
	}

	public function update(User $admin){

		$admin = auth()->user();

		$data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            //'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($admin->id)
            ],
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($admin->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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
                    Rule::unique('users')->ignore($admin->id)
                ],
                'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
                'password' => ['required', 'min:6'],
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                'poblacion' => 'min:1',
                'provincia' => 'min:1',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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

            $admin->id_poblacion = $data['poblacion'];
            $admin->id_provincia = $data['provincia'];            
            $admin->id_nivel = $data['niveles'];
            $data['password'] = bcrypt($data['password']);
            $admin->update($data);
          
        }else{
            $admin->id_poblacion = $data['poblacion'];
            $admin->id_provincia = $data['provincia'];
            $admin->id_nivel = $data['niveles'];
            unset($data['password']);
            $admin->update($data);
        }

        return redirect()->route('perfiles.show', ['user' => $admin]);
	}






}
