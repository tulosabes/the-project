<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'club';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'telefono', 'poblacion', 'provincia', 'c_postal', 'direccion', 
    ];

    public function servicio(){

        return $this->belongsTo(Servicio::class,'id'); // obtenemos un modelo
        // relacion de un usuario con una profesion
        // tambien se puede pasar como 2º argumento el campo al que hace referencia profesion_id
        // de esta manera conseguimos que un usuario puede acceder a los valores de la tabla profesion y asi nos muestre los valores de dicha tabla a los que esta asociado el usuario      
    }

    public function obtenerPoblacion(){

        $poblacion = Poblacion::find($this->id_poblacion);

        return $poblacion->poblacion;
    }    

    public function obtenerProvincia(){

        $provincia = Provincia::find($this->id_provincia);

        return $provincia->provincia;
    }

    public function obtenerCPostal(){

        $poblacion = Poblacion::find($this->id_poblacion);

        return $poblacion->c_postal;
    } 

    public function obtenerServicio($id){

        $servicio = Servicio::find($id);

        //dd($servicio->name);

        return $servicio->name;
    }
}
