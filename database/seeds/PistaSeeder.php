<?php 

use Illuminate\Database\Seeder;

use App\Pista;

class PistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pista::create([

        	'name' => 'Pista 1',
        	'descripcion' => 'Pista central de club, cirstales panorámicos y cesped de color azul, situada en la parde derecha del club.',
        	'disponibilidad' => true,
        ]);

        Pista::create([

        	'name' => 'Pista 2',
        	'descripcion' => 'Pista justo al lado de la pista central, cirstales normales y cesped de color azul, situada en la parte derecha del club.',
        	'disponibilidad' => true,
        ]);

        Pista::create([

        	'name' => 'Pista 3',
        	'descripcion' => 'Pista al lado contrario de la 1 y la 2, cirstales normales y cesped de color azul, situada en la parte izquierda del club',
        	'disponibilidad' => true,
        ]);

        Pista::create([

        	'name' => 'Pista 4',
        	'descripcion' => 'Pista justo al lado de la pista 3, cirstales normales y cesped de color azul, situada en la parte izquierda del club.',
        	'disponibilidad' => true,
        ]);

        Pista::create([

        	'name' => 'Pista 5',
        	'descripcion' => 'Pista baja, cristales normales y cesped de color azul, situada en la parte baja del club.',
        	'disponibilidad' => true,
        ]);
    }
}