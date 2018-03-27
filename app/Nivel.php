<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';

    protected $fillable = ['nivel'];

    public function users(){

    	return $this->hasMany(User::class,'id_nivel');
    }
}
