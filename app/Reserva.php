<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Horario;
use App\Pista;
use App\User;
use App\Nivel;
use Carbon\Carbon;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = ['id_hace_reserva', 'id_horario','id_pista','id_jugador_1','id_jugador_2','id_jugador_3','id_jugador_4','id_nivel','fecha'];

	public function users(){

    	return $this->hasMany(User::class,'id');
    }

    public function pista(){

    	return $this->belongsTo(Pista::class,'id'); 
    }

    public function horario(){

        return $this->belongsTo(Horario::class,'id'); 
    }    

    public function adminEmp(){

        return $this->belongsTo(User::class,'id'); 
    }

    public function obtenerHorario(){

    	$horario = Horario::find($this->id_horario);

        return $horario->hora;
    }

    public function obtenerPista(){

    	$pista = Pista::find($this->id_pista);

    	return $pista->name;
    }

    public function obtenerPistaHorario($pista, $horario,$fecha){

        //$pista = Reserva::obtenerPista();//where('id_pista','=',$pista)->where('id_horario','=',$horario)->get();

        //$horario = Reserva::obtenerHorario();

        //dd($pista,$horario,$fecha);

        $jugadores = Reserva::where('id_pista','=',$pista)->where('id_horario','=',$horario)->where('fecha','=',$fecha)->orderBy('fecha', 'asc')->first();

        //whereNotNull('id_jugador_1')->whereNotNull('id_jugador_2')->whereNotNull('id_jugador_3')->whereNotNull('id_jugador_4')->

        //dd($jugadores->contarNumeroJugadores());
        //dd($jugadores);


        $bool = true;

        if ($jugadores == null) {
            
            $bool = false;

        }

        return $bool;
    }

    public function obtenerJugador($id){

    	$user = User::find($id);

        $libre = true;

    	if($user == null){

            $libre = false;

            return $libre;
        
        }else{

            return $user->name;
        }

    }


    public function obtenerNameJugadores($id){

        $user = User::find($id);

        dd($user->name);

        $libre = true;

        if($user == null){

            $libre = false;

            return $libre;
        
        }else{

            return $user->name;
        }

    }

    public function obtenerRol($id){

        $user = User::find($id);

        return $user->obtenerRol();

    }

    public function obtenerNivel($id){

        $user = User::find($id);

        return $user->obtenerNivel();

    }

    public function formatoFecha($id){

        $fecha = Reserva::find($id);

        $date = Carbon::parse($fecha->fecha)->format('d-m-Y'); // para darle formato español a la fecha

        return $date;
    }

    public function contarNumeroJugadores(){

        $jugadores = Reserva::find($this->id);

        $contador = 0;

        if ($jugadores->id_jugador_1 != null) {
            
            $contador++;
        
        }

        if ($jugadores->id_jugador_2 != null) {
            
            $contador++;

        }

        if ($jugadores->id_jugador_3 != null) {
            
            $contador++;

        }

        if ($jugadores->id_jugador_4 != null) {
            
            $contador++;

        }


        if ($contador == 0) {
            
            $contador = 4;

        }elseif ($contador == 1) {
            
            $contador = 3;            

        }elseif ($contador == 2) {
            
            $contador = 2;            
        
        }elseif ($contador == 3) {
            
            $contador = 1;        

        }else{
            
            $contador = 0;

        }


        return $contador;

    }


    public function existeJugadoReserva($id_jugador,$id_pista,$id_horario){


        $existeJugador = Reserva::where('id_jugador_1','=',$id_jugador_1)->where('id_jugador_2','=',$id_jugador_2)->where('id_jugador_3','=',$id_jugador_3)->where('id_jugador_4','=',$id_jugador_4)->where('fecha','=',$fecha)->where('id_pista','=',$id_pista)->where('id_horario','=',$id_horario)->get();

    }






}
