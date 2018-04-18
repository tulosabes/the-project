<?php

use Illuminate\Database\Seeder;

use App\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([

        	'name' => 'Reserva de pistas',
        	'descripcion' => 'Puedes hacer reservas a traves de nuestra web o tambien puedes hacerlo a traves de nosotros en el telefono de contacto.'
        ]);

        Servicio::create([

        	'name' => 'Escuela de menores y adultos',
        	'descripcion' => 'Puedes realizar clases para mejorar tu padel, si estas interesado puedes cntactar con nosotros en el telefono de contacto.'
        ]);

        Servicio::create([

        	'name' => 'Tienda',
        	'descripcion' => 'Tenemos una tienda con todo lo que necesitas para tu equipación deportiva, en este caso Padel.'
        ]);

        Servicio::create([

        	'name' => 'Cafeteria',
        	'descripcion' => 'Tenemos un espacio donde poder tomar y comer algo mientras esperas o despues de terminar tu partida.'
        ]);

        Servicio::create([

        	'name' => 'Mantenimiento de pista',
        	'descripcion' => 'Para poder daros un buen servicio de nuestras instalaciones, estaremos con el mantenimiento de dicha pista, perdonen las molestias.'
        ]);

    }
}
