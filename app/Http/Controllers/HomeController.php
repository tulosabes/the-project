<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Provincia;
use App\Poblacion;
use App\Nivel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $title = 'Bienvenido a tu perfil de usuario';

        $jugador = auth()->user();

        return view('home.index', compact('title', 'jugador'));
 
    }

    public function show(User $jugador){

        return redirect()->route('home.index');
    }

    public function edit(User $jugador){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();

        $niveles = Nivel::all();

        $jugador = auth()->user();
        
        return view('home.edit', ['jugador' => $jugador ,'niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones]);
    }

    public function update(User $jugador){

        $jugador = auth()->user();

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
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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

        return redirect()->route('perfiles.show', ['user' => $jugador]);
    }

    public function destroy(User $jugador){

        $jugador->delete();

        return redirect()->route('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJugadores(User $user)
    {
        return view('home', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(User $user)
    {
        return view('admin', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmpleados(User $user)
    {
        return view('empleado', compact('user'));
    }



    










}
