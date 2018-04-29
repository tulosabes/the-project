<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importar la clase para trabajar con bases de datos
use Illuminate\Support\Facades\DB;

use App\Reserva;

use App\Pista;
use App\Horario;
use App\User;
use App\Nivel;
use App\Club;

use Carbon\Carbon;

// importar Rule para hacer la regla de validacion de email
use Illuminate\Validation\Rule;


class ReservasController extends Controller
{
 
	public function index(){

		$title = 'Bienvenido a reservas';

		$club = Club::first();

		$pistas = Pista::all();

		$horarios = Horario::where('id','>','1')->get();

		$reservas = Reserva::orderBy('fecha', 'asc')->get();

		$reservasIncompletas = Reserva::orWhereNull('id_jugador_1')->orWhereNull('id_jugador_2')->orWhereNull('id_jugador_3')->orWhereNull('id_jugador_4')->orderBy('fecha', 'asc')->get();

		$reservasCompletas = Reserva::where('id_jugador_1', '!=', null)->where('id_jugador_2', '!=', null)->where('id_jugador_3', '!=', null)->where('id_jugador_4', '!=', null)->orderBy('fecha', 'asc')->get();

		$date = Carbon::now(); 

		return view('reservas.index', compact('title', 'reservas', 'reservasCompletas', 'reservasIncompletas', 'pistas', 'horarios' , 'date', 'club'));

	}

	public function create(){

		$jugadores = User::where('id_rol', 3)->get();

		$niveles = Nivel::all();

		$pistas = Pista::all();

		$horarios = Horario::all();

		$datos = request()->all();

		//dd($datos['horario']);

		if (isset($datos['reserva'])) {
			
			$reserva = Reserva::find($datos['reserva']);
		}

		return view('reservas.create', compact('jugadores', 'niveles','horarios', 'pistas' ,'datos', 'reserva'));

	}


	public function show(Reserva $reserva){

		return view('reservas.show', compact('reserva'));
	}

	public function store(){

		//$datos = request()->all();
		//dd($datos);

		$datos = request()->validate([
			
			'fecha' => 'required',
			'pistas' => 'required',
			'horarios' => 'required',
			'niveles' => 'required',
			'jugador1' => 'required_without_all:jugador2,jugador3,jugador4',
			'jugador2' => 'required_without_all:jugador1,jugador3,jugador4',
			'jugador3' => 'required_without_all:jugador1,jugador2,jugador4',
			'jugador4' => 'required_without_all:jugador1,jugador2,jugador3'								
		]);

		//dd($datos);

		Reserva::create([

			'id_hace_reserva' => auth()->user()->id,
			'fecha' => $datos['fecha'],
			'id_pista' => $datos['pistas'],
			'id_horario' => $datos['horarios'],
			'id_nivel' => $datos['niveles'],
			'id_jugador_1' => $datos['jugador1'],
			'id_jugador_2' => $datos['jugador2'],
			'id_jugador_3' => $datos['jugador3'],
			'id_jugador_4' => $datos['jugador4'],

		]);
        
        return redirect()->route('reservas.index');
	}

	public function edit(Reserva $reserva){

		//dd($reserva);

		$niveles = Nivel::all();

		$pistas = Pista::all();

		$horarios = Horario::all();

		$jugadores = User::where('id_rol', 3)->get();

		return view('reservas.edit', compact('reserva', 'pistas', 'horarios', 'niveles', 'jugadores'));

	}

	public function update(Reserva $reserva){

		$datos = request()->validate([

			//'fecha' => 'required',
			//'pistas' => 'required',
			//'horarios' => 'required',
			'niveles' => 'required',
			'jugador1' => 'required_without_all:jugador2,jugador3,jugador4',
			'jugador2' => 'required_without_all:jugador1,jugador3,jugador4',
			'jugador3' => 'required_without_all:jugador1,jugador2,jugador4',
			'jugador4' => 'required_without_all:jugador1,jugador2,jugador3'	

		]);

		//dd($datos);

		//$reserva->fecha = $datos['fecha'];
		//$reserva->id_pista = $datos['pistas'];
		//$reserva->id_horario = $datos['horarios'];
		$reserva->id_nivel = $datos['niveles'];
		$reserva->id_jugador_1 = $datos['jugador1'];
		$reserva->id_jugador_2 = $datos['jugador2'];
		$reserva->id_jugador_3 = $datos['jugador3'];
		$reserva->id_jugador_4 = $datos['jugador4'];

		$reserva->update($datos);

		//return redirect()->route('reservas.index');
		return view('reservas.show', compact('reserva'));
	}

	public function destroy(Reserva $reserva){

		//dd($reserva);

		$reserva->delete();

		return redirect()->route('reservas.index');
	}

	public function destroyJug(User $id_jugador, Reserva $id_reserva){

		$reserva = Reserva::find($id_reserva);

		dd($reserva);

		if (condition) {
			
			$reserva->id_jugador_1->delete();

		}elseif (condition) {
		
			
			$reserva->id_jugador_2->delete();
		}elseif (condition) {
			
			
			$reserva->id_jugador_3->delete();
		}elseif (condition) {
			
			
			$reserva->id_jugador_4->delete();			
		}

		//return view('reservas.show', compact('reserva'));

	}

}