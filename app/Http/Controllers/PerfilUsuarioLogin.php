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

		$title = 'Bienvenido a tu perfil';

		$admin = auth()->user();

		return view('perfiles.index', compact('title', 'admin'));
 
	}

	public function show(User $admin){

		return redirect()->route('perfiles.index');
	}

	public function edit(User $admin){

        $admin = auth()->user();

		$provincias = Provincia::orderBy('provincia', 'asc')->get();
        $poblaciones = Poblacion::where('id_provincia', $admin->id_provincia)->get();

        $niveles = Nivel::all();
        
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
                Rule::unique('users')->ignore($admin->id),
                'confirmed'
            ],
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($admin->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'passwrod-confirm' => '',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'niveles' => 'required',
        ]);



        if ($data['password'] != null) {

            $data = request()->validate([

                'name' => 'required|string|max:20', // campo cual debe de ser requerido
                //'dni' => ['required', 'min:9','unique:users,dni'],
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($admin->id),
                    'confirmed'
                ],
                'telefono' => array('required','numeric',Rule::unique('users')->ignore($admin->id),'regex:/^[9|6|7][0-9]{8}$/'),
                'password' => 'required|string|min:6|confirmed',
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                'poblacion' => 'min:1',
                'provincia' => 'min:1',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($admin->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'niveles' => 'required',
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
