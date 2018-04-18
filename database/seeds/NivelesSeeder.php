<?php

use Illuminate\Database\Seeder;

use App\Nivel;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create([

    		'nivel' => 'Principiante'
    	]);

    	Nivel::create([

    		'nivel' => 'Amater'
    	]);

    	Nivel::create([

    		'nivel' => 'Intermedio'
    	]);

    	Nivel::create([

    		'nivel' => 'Profesional'
    	]);
    }
}
