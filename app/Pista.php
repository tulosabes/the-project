<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    protected $table = 'pistas';

    protected $fillable = ['name', 'descripcion','disponibilidad'];

    /*public function club(){

    	return $this->hasMany(Servicio::class,'id_servicio');
    }*/

    public function verDisponibilidad(){

    	$disponible = Pista::find($this->id);

    	if ($disponible->disponibilidad === 1) {
    		
    		return 'Disponible';
    	
    	}else{

    		return 'No disponible';
    	}
    }

    public function horario(){

    	return $this->belongsTo(Horario::class,'id');
    }

    public function obtenerHorario(){

        $horario = Horario::find($this->id_horario);

        return $horario->hora;

    }
}
