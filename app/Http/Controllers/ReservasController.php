<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reserva;

use App\Pista;
use App\Horario;
use Carbon\Carbon;

use App\User;
use App\Nivel;


class ReservasController extends Controller
{
 
	public function index(){

		$title = 'Bienvenido a reservas';

		$pistas = Pista::all();

		$horarios = Horario::where('id','>','1')->get();

		$reservas = Reserva::orderBy('fecha', 'asc')->get();

		$reservasIncompletas = Reserva::orWhereNull('id_jugador_1')->orWhereNull('id_jugador_2')->orWhereNull('id_jugador_3')->orWhereNull('id_jugador_4')->orderBy('fecha', 'asc')->get();

		$reservasCompletas = Reserva::where('id_jugador_1', '!=', null)->where('id_jugador_2', '!=', null)->where('id_jugador_3', '!=', null)->where('id_jugador_4', '!=', null)->orderBy('fecha', 'asc')->get();


		$date = Carbon::now(); // para darle formato español a la fecha



		//dd($date->formatLocalized('%A %d'));

		//dd($reservasCompletas);

		return view('reservas.index', compact('title', 'reservas', 'reservasCompletas', 'reservasIncompletas', 'pistas', 'horarios' , 'date'));

	}

	public function create(){

		$jugadores = User::where('id_rol', 3)->get();

		$niveles = Nivel::all();

		$pistas = Pista::all();

		$horarios = Horario::all();

		$datos = request()->all();

		//dd($datos['horario']);

		//dd($jugadores);

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
			'jugador1' => 'required_if:jugador2,==,null|required_if:jugador3,==,null|required_if:jugador4,==,null|nullable',
			'jugador2' => 'required_if:jugador1,==,null|required_if:jugador3,==,null|required_if:jugador4,==,null|nullable',
			'jugador3' => 'required_if:jugador1,==,null|required_if:jugador2,==,null|required_if:jugador4,==,null|nullable',
			'jugador4' => 'required_if:jugador1,==,null|required_if:jugador2,==,null|required_if:jugador3,==,null|nullable',
		]);

		//dd($datos);

		Reserva::create([



		]);

		

        
        return redirect()->route('reservas.index');
	}

	public function edit(Reserva $rsv){


	}

	public function update(Reserva $rsv){


	}

	public function destroy(Reserva $rsv){


	}
}