<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Provincia;
use App\Poblacion;
use App\Nivel;

use Carbon\Carbon;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

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

        $date = Carbon::now();

        return view('home.index', compact('title', 'jugador','date'));
 
    }

    public function show(User $jugador){

        return view('home.show', compact('jugador'));
    }

    public function edit(User $jugador){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();

        $jugador = auth()->user();

        $date = Carbon::now();
        
        return view('home.edit', ['jugador' => $jugador,'provincias' => $provincias, 'poblaciones' => $poblaciones, 'date' => $date]);
    }

    public function update(User $jugador){

        //$jugador = auth()->user();

        $data = request()->validate([

            'name' => 'required|string|max:20', 
            'fecha_nacimiento' => 'required',
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($jugador->id),
                'confirmed'
            ],
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($jugador->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'poblacion' => 'min:1',
            'provincia' => 'min:1',
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
        ]);

        if ($data['password'] != null) {

            $data = request()->validate([

                'name' => 'required|string|max:20',
                'fecha_nacimiento' => 'required',
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($jugador->id),
                    'confirmed'
                ],
                'telefono' => array('required','numeric',Rule::unique('users')->ignore($jugador->id),'regex:/^[9|6|7][0-9]{8}$/'),
                'password' => 'required|string|min:6|confirmed',
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                'poblacion' => 'min:1',
                'provincia' => 'min:1',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            ]);

            $jugador->id_poblacion = $data['poblacion'];
            $jugador->id_provincia = $data['provincia'];            
            $data['password'] = bcrypt($data['password']);
            $jugador->update($data);
          
        }else{
            
            $jugador->id_poblacion = $data['poblacion'];
            $jugador->id_provincia = $data['provincia'];
            unset($data['password']);
            $jugador->update($data);
        }

        return redirect()->route('home.show', ['user' => $jugador]);
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
