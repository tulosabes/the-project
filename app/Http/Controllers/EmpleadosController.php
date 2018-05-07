<?php

// namespace es como el apellido de una clase, podemos tener 2 clases con el mismo nombre, pero cada clase tiene un namescape diferente, como dos personas con el mismo nombre pero apellidos diferentes
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

class EmpleadosController extends Controller
{

   

    // se va a referir a la pagina principal de nustro modulo de usuarios, cuya logica va a estar encapsulada dentro de la clase UserController
    public function index(){

 
        $title = 'Listado de empleados';

        // 1º forma de coger datos de una tabla sql
        //$users = DB::table('users')->get(); // de esta manera obtenemos un obejeto con las propiedades/campos que tenemos en la DB

        // 2º forma de coger datos de una tabla eloquent
        $empleados = User::where('id_rol', 2)->paginate(10); // de esta manera obtenemos un objeto de eloquent con mucha mas informacion

        //dd($empleados);

        // maneras de pasar datos a la vista, son todas validas
        //return view('empleados.index')->with('empleados', User::all())->with('title','Listado de usuarios');
        return view('empleados.index', compact('title','empleados'));

    }

    public function show(User $empleado){

        //dd($empleado);

        return view('empleados.show', compact('empleado'));
    }

    public function create(){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $date = Carbon::now();

        $niveles = Nivel::all();
        
        return view('empleados.create', ['niveles' => $niveles,'provincias' => $provincias, 'date' => $date]);
    }

    public function store(){

        $data = request()->validate([

            'name' => 'required|string|max:20', // campo cual debe de ser requerido
            'fecha_nacimiento' => 'required',
            'dni' => array('required_if:nif,==,0','unique:users','regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0','unique:users','regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'sexo' => 'required',
            'email' => ['required','email','unique:users','confirmed'], 
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'telefono' => array('required','numeric','unique:users','regex:/^[9|6|7][0-9]{8}$/'),
            'password' => 'required|string|min:6|confirmed',
            'niveles' => 'required|min:1',
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
            'id_rol' => 2,
            'id_nivel' => $data['niveles'],
            'id_provincia' => $data['provincia'],
            'id_poblacion' => $data['poblacion'],

        ]);

        //return redirec('usuarios');
        return redirect()->route('empleados.index');

    }

    public function edit(User $empleado){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::where('id_provincia', $empleado->id_provincia)->orderBy('poblacion', 'asc')->get();

        $date = Carbon::now();

        $niveles = Nivel::all();
        
        return view('empleados.edit', ['empleado' => $empleado, 'niveles' => $niveles,'provincias' => $provincias, 'poblaciones' => $poblaciones, 'date' => $date]);
    }

    public function update(User $empleado){

        $data = request()->validate([

            'name' => 'required|string|max:20',
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($empleado->id),
                'confirmed'
            ],
            'telefono' => array('required','numeric',Rule::unique('users')->ignore($empleado->id),'regex:/^[9|6|7][0-9]{8}$/'),
            'password' => '',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required',
            'apellidos' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:50',
            
            'niveles' => 'required|min:1',
            'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
            'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
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

                'name' => 'required|string|max:20', 
                'fecha_nacimiento' => 'required',
                'email' => [
                    'required',
                    'email', 
                    Rule::unique('users')->ignore($empleado->id),
                    'confirmed'
                ],
                'telefono' => array('required','numeric',Rule::unique('users')->ignore($empleado->id),'regex:/^[9|6|7][0-9]{8}$/'),
                'password' => 'required|string|min:6|confirmed',
                'sexo' => 'required',
                'apellidos' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:50',
                
                'niveles' => 'required|min:1',
                'dni' => array('required_if:nif,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'nif' => array('required_if:dni,==,0',Rule::unique('users')->ignore($empleado->id),'regex:/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i','nullable'),
                'niveles' => 'required',
                'poblacion' => 'numeric|min:1',
                'provincia' => 'numeric|min:1',
            ],
            [
                'poblacion.min' => 'Tiene que elegir una población',
                'provincia.min' => 'Tiene que elegir una provincia'
            ]);

            $empleado->id_poblacion = $data['poblacion'];
            $empleado->id_provincia = $data['provincia'];            
            $empleado->id_nivel = $data['niveles'];
            $data['password'] = bcrypt($data['password']);
            $empleado->update($data);
          
        }else{
            $empleado->id_poblacion = $data['poblacion'];
            $empleado->id_provincia = $data['provincia'];
            $empleado->id_nivel = $data['niveles'];
            unset($data['password']);
            $empleado->update($data);
        }

        return redirect()->route('empleados.show', ['user' => $empleado]);
    }

    public function destroy(Request $request,$id_empleado){

        //dd($empleado);

        //$this->user->delete();

        if($request->ajax()){

            $empleado = User::find($id_empleado);

            $msn = ['nombre' => 'El empleado ' . $empleado->name . ' fue eliminado'];

            $empleado->delete();

            return $msn;
        
        }else{

            $msn = ['nombre' => 'La petición no a tenido efecto'];

            return $msn;
        }
    }


    public function admin(){

        $title = 'Perfil del Administrador';

        $admin = User::all()->where('id_rol', 1);

        return view('perfil.admin', compact('title','admin'));
    }

    public function empleado(){


    }

    public function jugador(){


    }
}
