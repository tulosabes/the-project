<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    
    protected $table = 'poblacion';

    protected $fillable = ['poblacion','poblacionseo','c_postal'];

    public function users(){

    	return $this->hasMany(User::class,'id_poblacion');
    }

    public function provincia(){

    	return $this->belongsTo(Provincia::class,'id');
    }
}
