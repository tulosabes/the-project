<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

// importar App\Users para trabajar con eloquent
use App\Pista;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class PistasController extends Controller
{
    
    public function index(){

    	$title = 'Listado de pistas';

    	$pistas = Pista::all();

    	//dd($pistas);

    	return view('pistas.index', compact('title','pistas'));
    }

    public function show(Pista $pista){

    	return redirect()->route('pistas.index');
    }

    public function edit(Pista $pista){

    	return view('pistas.edit', ['pista' => $pista]);
    }

    public function update(Pista $pista){

    	$data = request()->validate([

    		'name' => ['required',Rule::unique("pistas")->ignore($pista->id)],
    		'descripcion' => 'required',
    		'disponibilidad' => 'required'
    	],
    	[
    		'name.required' => 'El campo Nombre es obligatorio',
    		'name.unique' => 'El nombre de esta pista ya existe en la base de datos, elija otro nombre para esta pista',
    		'descripcion.required' => 'El campo descripción es obligatorio',
    		'disponibilidad.required' => 'Tiene que elegir una disponibilidad',
    	]
    	);

    	$pista->disponibilidad = $data['disponibilidad'];

    	$pista->update($data);

    	return redirect()->route('pistas.index');

    }
}
