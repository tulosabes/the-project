<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = ['rol'];

    public function users(){

    	return $this->hasMany(User::class,'id_rol');
    }
}
