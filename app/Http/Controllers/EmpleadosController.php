<?php

// namespace es como el apellido de una clase, podemos tener 2 clases con el mismo nombre, pero cada clase tiene un namescape diferente, como dos personas con el mismo nombre pero apellidos diferentes
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\User;
use App\Nivel;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class EmpleadosController extends Controller
{

   

    // se va a referir a la pagina principal de nustro modulo de usuarios, cuya logica va a estar encapsulada dentro de la clase UserController
    public function index(){

        /*if (request()->has('empty')) {
            
            $users = [];
        
        }else{

            $users = [
                    'carlos', 'maria', 'garrancho', 'debora', 'montserrat'
                ];
        }

        $title = 'Listado de usuarios';

    	 1 Manera de pasar variables a la vista
        return view(
                'users', // hace referencia al archivo users.php sin extension
                [   
                    'users' => $users,
                    'title' => 'Listado de usuarios',
                ]);*/

        /* 2 manera de pasar variables a la vista
        
        return view('users')->with([
            'users' => $users,
            'title' => 'Listado de usuarios',
        ]);*/

        /* 3 manera de pasar variables a la vista
        
        return view('users')
        ->with('users', $users)
        ->with('title', $title);*/

        /* 4º manera de pasar variables a la vista
        */
        //var_dump(compact('title','users')); die();

        // comprobar el resultado de una funcion o los datos que tenemos en una variable
        // nos muestra un array asociativo, y esto lo conseguimos con el metodo "compact()"
        //dd(compact('title','users'));
 
        $title = 'Listado de empleados';

        // 1º forma de coger datos de una tabla sql
        //$users = DB::table('users')->get(); // de esta manera obtenemos un obejeto con las propiedades/campos que tenemos en la DB

        // 2º forma de coger datos de una tabla eloquent
        $empleados = User::all()->where('id_rol', 2); // de esta manera obtenemos un objeto de eloquent con mucha mas informacion

        //dd($empleados);

        // maneras de pasar datos a la vista, son todas validas
        //return view('empleados.index')->with('empleados', User::all())->with('title','Listado de usuarios');
        return view('empleados.index', compact('title','empleados'));

    }

    /*public function show($id){

        /*$user = User::find($id); //si lo uso con find necesito el condicional para que surja efecto si es null el valor

        //dd($user);

        if ($user == null) {
            
            //return view('errors.404');
            return response()->view('errors.404', [], 404);
        }

        $user = User::findOrFail($id); // arroja una excepcion que finaliza la accion de este metodo, no le deja seguir, pero esta excepcion va a ser capturada por Laravel y lo que hace Laravel es transformar la respuesta en un error 404, y si hemos definido una vista con el nombre "404" dentro de la carpeta "errors" en este caso Laravel la va a utilizar en nuestra respuesta, (resumiendo, Laravel busca la pagina que nostros creamos como 404, y no hacen falta los pasos anteriores comprobando con su condicion y devolviendo con response() su ruta,parametros,y el error)

        return view('users.show', compact('user'));
    }*/

    // todavia hay otra manera mas facil que en las 2 de arriba del metodo show($id)
    // en este caso en routes/web.php tenemos que cambiar el $id pasado como argumento por un variable de tipo User como tenemos ahora en la funcion show(User $user)
    public function show(User $empleado){

        //dd($empleado);

        return view('empleados.show', compact('empleado'));
    }

    public function create(){

        $niveles = Nivel::all();

    	return view('empleados.create', compact('empleado', 'niveles'));
    }

    public function store(){

        /*
         es una manera bastante engorrosa, si queremos enviar un solo mensaje de error no estaria mal utilizarla con sus respectivo condicional if y demas, pero si queremos enviar muchos avisos de error hay otra manera mejor que explicaremos abajo
        
        $data = request()->all();

        //dd($data);

        if (empty($data['name'])) {
            
            return redirect(route('users.create'))->withErrors([

                'name' => 'El campo nombre es obligatorio',
            ]);
        }*/

        // pero laravel tiene una menra de validar los datos y es con el metodo validate()
        // validate nos retorna los campos con reglas o los que estan especificados aqui pero sin reglas(ejm:required)
        $data = request()->validate([

            'name' => 'required', // campo cual debe de ser requerido
            'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => ['required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
            //'telefono' => ['required', 'min:9', 'unique:users,telefono'],
            'telefono' => [
                'required',
                'min:9', 
                Rule::unique('users')->ignore($empleado->id)
            ],
            'password' => ['required', 'min:6'],
            'niveles' => 'required'
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
            'dni' => $data['dni'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => bcrypt($data['password']),
            'id_rol' => 2,
            'id_nivel' => $data['niveles'],
            'c_postal' => 03500,

        ]);

        //return redirec('usuarios');
        return redirect()->route('empleados.index');

    }

    public function edit(User $empleado){

        $niveles = Nivel::all();
    	
        return view('empleados.edit', ['empleado' => $empleado, 'niveles' => $niveles]);
    }

    public function editText($text){

    	return "El texto {$text} no es correcto, debe introducir un numero";
    }

    public function update(User $empleado){

        $data = request()->validate([

            'name' => 'required', // campo cual debe de ser requerido
            //'dni' => ['required', 'min:9','unique:users,dni'],
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore($empleado->id)
            ],
            //'email' => ['required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
            //'telefono' => ['required', 'min:9', 'unique:users,telefono'],
            'telefono' => [
                'required',
                'min:9', 
                Rule::unique('users')->ignore($empleado->id)
            ],
            'c_postal' => 'max:5',
            'password' => '',
            'apellidos' => '',
            'direccion' => '',
            'poblacion' => '',
            'provincia' => '',
            'dni' => [
                'required',
                'min:9', 
                Rule::unique('users')->ignore($empleado->id)
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
            'telefono.unique' => 'El telefono introducido ya existe en la base de datos',
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
                    Rule::unique('users')->ignore($empleado->id)
                ],
                //'email' => ['','required','email','unique:users,email'], // 'required|email|.....|.....' unique: es la unica regla que tiene parametros, 1º la tabla a la que asociaremos este email, y 2º el nombre de la columna asociada a esta tabla 
                //'telefono' => ['required', 'min:9', 'unique:users,telefono'],
                'telefono' => [
                    'required',
                    'min:9', 
                    Rule::unique('users')->ignore($empleado->id)
                ],
                'c_postal' => 'max:5',
                'password' => ['required', 'min:6'],
                'apellidos' => '',
                'direccion' => '',
                'poblacion' => '',
                'provincia' => '',
                'dni' => [
                    'required',
                    'min:9', 
                    Rule::unique('users')->ignore($empleado->id)
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
                'telefono.unique' => 'El telefono introducido ya existe en la base de datos',
                'c_postal.max' => 'El código postal debe contener 5 digitos',
                'password.required' => 'El campo password es obligatorio',
                'password.min' => 'La contraseña debe de tener mas de 6 caracteres',
                'niveles.required' => 'El campo de nivel es obligatorio',
            ]);


            $empleado->id_nivel = $data['niveles'];
            $data['password'] = bcrypt($data['password']);
            $empleado->update($data);
          
        }else{

            $empleado->id_nivel = $data['niveles'];
            unset($data['password']);
            $empleado->update($data);
        }

        return redirect()->route('empleados.show', ['user' => $empleado]);
    }

    public function destroy(User $empleado){

        $empleado->delete();

        return redirect()->route('empleados.index');
    }
}
