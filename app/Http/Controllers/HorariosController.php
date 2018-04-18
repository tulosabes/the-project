<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Horario;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;

class HorariosController extends Controller
{
 
	public function index(){

		$title = 'Listado de horarios';

    	$horarios = Horario::all()->where('id','>', 1);

    	//dd($horarios);

    	return view('horarios.index', compact('title','horarios'));
	}

	public function show(Horario $horario){

    	return redirect()->route('horarios.index');
    }

	public function edit(Horario $horario){

		$horas = Horario::all()->where('id','>', 1);

    	return view('horarios.edit', ['horario' => $horario, 'horas' => $horas]);
    }

	public function update(Horario $horario){

		$data = request()->validate([

			'name' => ['required',Rule::unique("horarios")->ignore($horario->id)],
    		'hora' =>['required', Rule::unique("horarios")->ignore($horario->id)],
		],
		[
			'name.required' => 'El campo Nombre es obligatorio',
    		'name.unique' => 'El nombre de esta horario ya existe en la base de datos, elija otro nombre para esta horario',
			'hora.unique' => 'El horario elegido ya esta en una sesion'
		]);


    	$horario->update($data);

    	return redirect()->route('horarios.index');
	}








}
