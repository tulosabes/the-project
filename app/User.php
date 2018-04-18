<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

//    protected $table = 'users'; // Laravel coge la tabla nosmalmente haciendo referencia la nombre del archivo.php, pero de esta menera lo que hacemos es decirselo directamente a la tabla de donde tiene que coger los datos, si no estuvieramos utilizando la convencion de laravel

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni','nif' ,'id_rol', 'id_nivel', 'telefono', 'id_poblacion', 'id_provincia', 'c_postal', 'apellidos', 'direccion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [

        'id_rol' => 'integer',
        'id_nivel' => 'integer'
    ];

    public function rol(){

        return $this->belongsTo(Role::class,'id'); // obtenemos un modelo
        // relacion de un usuario con una profesion
        // tambien se puede pasar como 2º argumento el campo al que hace referencia profesion_id
        // de esta manera conseguimos que un usuario puede acceder a los valores de la tabla profesion y asi nos muestre los valores de dicha tabla a los que esta asociado el usuario      
    }

    public function provincia(){

        return $this->belongsTo(Provincia::class,'id');     
    }

    public function poblacion(){

        return $this->belongsTo(Poblacion::class,'id');    
    }

    public function nivel(){

        return $this->belongsTo(Nivel::class,'id');

    }

    public function obtenerRol(){

        $rol = Role::find($this->id_rol);

        //dd($rol->rol);

        return $rol->rol;
    }

    public function obtenerNivel(){

        $nivel = Nivel::find($this->id_nivel);

        //dd($nivel->nivel);

        return $nivel->nivel;
    }

    public function obtenerPoblacion(){

        $poblacion = Poblacion::find($this->id_poblacion);

        return $poblacion->poblacion;
    }    

    public function obtenerProvincia(){

        $provincia = Provincia::find($this->id_provincia);

        return $provincia->provincia;
    }    

    public function isAdmin(){

        return $this->id_rol;
    }

    public static function findByEmail($email){

        return static::where(compact('email'))->first(); // compara el email con el pasado por parametro
    }
}
