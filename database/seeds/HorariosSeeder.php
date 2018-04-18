<?php

use Illuminate\Database\Seeder;

use App\Horario;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Horario::create([

        	'name' => 'Mañana 0',
        	'disponibilidad' => true,
        	'hora' => '',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Mañana 1',
        	'disponibilidad' => true,
        	'hora' => '9:30',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Mañana 2',
        	'disponibilidad' => true,
        	'hora' => '11:00',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Mañana 3',
        	'disponibilidad' => true,
        	'hora' => '12:30',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Tarde 1',
        	'disponibilidad' => true,
        	'hora' => '16:00',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Tarde 2',
        	'disponibilidad' => true,
        	'hora' => '17:30',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Tarde 3',
        	'disponibilidad' => true,
        	'hora' => '19:00',
        	'duracion' => '1:30h'
        ]);

        Horario::create([

        	'name' => 'Tarde 4',
        	'disponibilidad' => true,
        	'hora' => '20:30',
        	'duracion' => '1:30h'
        ]);
    }
}
