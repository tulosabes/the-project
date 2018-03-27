<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::create([

    		'rol' => 'Administrador'
    	]);

    	Role::create([

    		'rol' => 'Empleado'
    	]);

    	Role::create([

    		'rol' => 'Jugador'
    	]);

    	Role::create([

    		'rol' => 'Invitado'
    	]);
    }
}
