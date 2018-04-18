<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    
	protected $table = 'provincia';

	protected $fillable = ['provincia','provinciaseo','provincia3'];

	public function users(){

    	return $this->hasMany(User::class,'id_provincia');
    }

	public function pueblos(){

        return $this->hasMany(Poblacion::class,'id_provincia');     
    }

    public function obtenerPoblaciones(){

    	$poblaciones = Poblacion::find($this->id_provincia);

    	//dd($poblaciones);

    	return $poblaciones;
    }

    public function obtenerCpostales(){

    	$c_postales = Poblacion::find($this->id_provincia);

    	//dd($c_postal);

    	return $c_postales;


    }

}
