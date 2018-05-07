<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Provincia;
use App\Poblacion;
use App\Nivel;
use App\Club;

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

    // ruta privada para traer los jugadores a las reservas
    public function jugadores($id_nivel){

        $jugadores = User::where('id_nivel', $id_nivel)->get();

        return response()->json($jugadores);
        
    }

    public function index(){

        $club = Club::first();

        $admin = User::where('id_rol','=',1)->first();
        
        return view('home', compact('club','admin'));
    }

    public function show(User $jugador){

        $club = Club::first();

		$admin = User::where('id_rol','=',1)->first();

        return view('home.show', compact('jugador','club','admin'));
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
    public function indexJugadores()
    {

        $title = 'Bienvenido a tu perfil de usuario';

        $jugador = auth()->user();

        $date = Carbon::now();

        return view('home.indexJugadores', compact('title', 'jugador','date'));

        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        return view('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmpleados()
    {
        return view('empleado');
    }


    









}
