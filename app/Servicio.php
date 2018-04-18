<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['name', 'descripcion'];

    public function club(){

    	return $this->hasMany(Club::class,'id_servicio');
    }
}
