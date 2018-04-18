<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Reserva;

class Horario extends Model
{

	protected $fillable = ['name','disponibilidad','hora','duracion'];

    public function pistas(){

        return $this->hasMany(Pista::class,'id_horario');  
    }

    public function reservas(){

    	return $this->hasMany(Reserva::class, 'id_horario');
    }

    public function obtenerPista(){

        $pista = Pista::fins($this->id);

        return $pista->name;
    }

    public function obtenerReserva($pista,$fecha){

        $reserva = Reserva::where('id_horario','=',$this->id)->where('id_pista','=',$pista)->where('fecha','=',$fecha)->first();

        //dd($reserva);

        $bool = true;

        if ($reserva == null) {
            
            $bool = false;
        }

        return $bool;
    }

    public function obtenerNumJugadores(){

    	$jugadores = Reserva::where('id_horario','=',$this->id)->get();

    	//dd($jugadores->id_jugador_1);
    	//dd($jugadores);

    	$contador = 0;

    	foreach ($jugadores as $jugador) {

    		
    		
    		if ($jugador->id_jugador_1 != null) {
	            
	            $contador++;
	        
	        }

	        if ($jugador->id_jugador_2 != null) {
	            
	            $contador++;

	        }

	        if ($jugador->id_jugador_3 != null) {
	            
	            $contador++;

	        }

	        if ($jugador->id_jugador_4 != null) {
	            
	            $contador++;

	        }

	        

    	}
		
		return $contador;

     
    }
}
