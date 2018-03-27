<?php

use Illuminate\Database\Seeder;

use App\Club;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([

        	'name' => 'RP-PADEL',
        	'email' => 'tulosabes1984@gmail.com',
        	'telefono' => '699463618',
        	'direccion' => 'Avenida Alfonso puchades nº10',
        	'poblacion' => 'Benidorm',
        	'provincia' => 'Alicante',
        	'c_postal' => '03501',
        ]);
    }
}

