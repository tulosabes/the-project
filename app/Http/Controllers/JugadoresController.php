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

use Carbon\Carbon;

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

        $date = Carbon::now();

        $niveles = Nivel::all();
        
        return view('jugadores.create', ['niveles' => $niveles,'provincias' => $provincias, 'date' => $date]);
    }

    public function store(){

        $data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            'dni' => array('required_if:nif,==,0','unique:users','regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0','unique:users','regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'fecha_nacimiento' => 'required',
            'sexo' => 'required',
            'email' => ['required','email','unique:users','confirmed'], 
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
            'password' => 'required|string|min:6|confirmed',
            'niveles' => 'required',
            'poblacion' => 'numeric|min:1',
            'provincia' => 'numeric|min:1',
        ],
        [
            'poblacion.min' => 'Tiene que elegir una población',
            'provincia.min' => 'Tiene que elegir una provincia'
        ]);

        User::create([

            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'dni' => $data['dni'],
            'nif' => $data['nif'],
            'sexo' => $data['sexo'],
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

        $poblaciones = Poblacion::where('id_provincia', $jugador->id_provincia)->orderBy('poblacion', 'asc')->get();

        $date = Carbon::now();

        $niveles = Nivel::all();
        
        return view('jugadores.edit', ['jugador' => $jugador ,'niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones, 'date' => $date]);
    }

    public function update(User $jugador){

         $data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            //'dni' => ['required', 'min:9','unique:users,dni'],
            /*'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($jugador->id),
                'confirmed'
            ]*/
            'email' => '', 
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($jugador->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'niveles' => 'required',
            'poblacion' => 'numeric|min:1',
            'provincia' => 'numeric|min:1',
        ],
        [
            'poblacion.min' => 'Tiene que elegir una población',
            'provincia.min' => 'Tiene que elegir una provincia'
        ]);


        if ($data['password'] != null) {

            $data = request()->validate([

                'name' => 'required|string|max:20', // campo cual debe de ser requerido
                'fecha_nacimiento' => 'required',
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($jugador->id),
                    'confirmed'
                ],
                'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
                'password' => 'required|string|min:6|confirmed',
                'sexo' => 'required',
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($jugador->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'niveles' => 'required',
                'poblacion' => 'numeric|min:1',
                'provincia' => 'numeric|min:1',
            ],
            [
                'poblacion.min' => 'Tiene que elegir una población',
                'provincia.min' => 'Tiene que elegir una provincia'
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

    public function destroy(Request $request,$id_jugador){

        //dd($jugador);

        //$this->user->delete();

        if($request->ajax()){

            $jugador = User::find($id_jugador);

            $msn = ['nombre' => 'El jugador ' . $jugador->name . ' fue eliminado'];

            $jugador->delete();

            return $msn;
        
        }else{

            $msn = ['nombre' => 'La petición no a tenido efecto'];

            return $msn;
        }
    }
}
