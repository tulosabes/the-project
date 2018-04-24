<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\Club;
use App\Provincia;
use App\Poblacion;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class ClubController extends Controller
{
    public function index(){
 
        $title = 'Información del club';

        $club = Club::all()->where('id',1); 

        //dd($club);

        return view('club.index', compact('title','club'));
    }

    public function show(Club $club){

        return redirect()->route('club.index');
    }

    public function edit(Club $club){

        $provincias = Provincia::orderBy('provincia', 'asc')->get();

        $poblaciones = Poblacion::orderBy('poblacion', 'asc')->get();

    	return view('club.edit', compact('club','provincias','poblaciones'));
    }

    public function update(Club $club){

    	$data = request()->validate([

    		'name' => 'required|max:20',
    		'email' => 'required|email',
    		'telefono' => 'required|numeric|max:999999999',
    		'direccion' => 'required|max:50',
    		'poblacion' => 'required|max:20',
    		'provincia' => 'required|max:20',
    		'c_postal' => 'required|numeric|max:99999',
    	],
    	[
    		'name.required' => 'El campo nombre es obligatorio',
    		'email.required' => 'El campo correo elecotronico es obligatorio',
    		'email.email' => 'Tiene que escribir un email correcto (ejemplo@ejemplo.com)',
    		'telefono.required' => 'El campo telefono es obligatorio',
    		'telefono.numeric' => 'El valor del campo tiene que ser numerico',
    		'direccion.required' => 'El campo direccion es obligatorio',
    		'poblacion.required' => 'El campo poblacion es obligatorio',
    		'provincia.required' => 'El campo provincia es obligatorio',
    		'c_postal.required' => 'El campo codigo postal es obligatorio',

    	]);

    	//dd($club);

    	$club->update($data);

        return redirect()->route('club.index');

    }
}
