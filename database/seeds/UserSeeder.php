<?php

use Illuminate\Database\Seeder;

// importar
use Illuminate\Support\Facades\DB;

// importar para el modelo HEMOS CREADO LA CARPETA MODELS PARA LOS MODELOS
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// forma sql, para asignar una profesion por defecto al usuario que creamos, no es la forma mas segura
    	//$ = DB::select('SELECT id FROM  WHERE title="Desarrollador Back-end"');

    	// de esta manera es mas segura (solo un resultado con LIMIT)
    	//$ = DB::select('SELECT id FROM  WHERE title=? LIMIT 0,1',["Desarrollador Back-end"]);

    	// la otra manera, consultas sql de LARAVEL
    	// le decimos que seleccione el id de , take(1) que devuelva 1 solo valor y get para obtener el resultado, esto devulve un objeto de tipo "Collection" que es una clase con la que trabajar los arrays devueltos por la consulta
    	//$ = DB::table('')->select('id')->take(1)->get();

    	// podemos evitar los dos ultimos metodos de la consulta anterior ->take(1)->get(), poniendo first(), con esto nos devolvera el 1ª resultado
    	//$profesion = DB::table('')->select('id')->first();

    	// con value cogemos el valor directamente de la consulta, en ve de un array asociativo como antes
    	//$profesionID = DB::table('')->select('id')->value('id');

    	//dd($profesionID); // para ver el valor devuelto de la consulta y el codigo no sigue ejecutandose, first = $[0]

        /*DB::table('users')->insert([

        	'name' => 'Carlos Garcia',
        	'email' => 'ejemplo@ejemplo.com',
        	'password' => bcrypt('laravel'), //encripta la contraseña
        	'profesion_id' => $profesionID// 1º manera $profesion->id,
        ]);*/

        // HAY OTRA MANERA QUE NOS TRAE LARAVEL LLAMADA "ELOQUENT" (ORM-) que es una manera mas alta todavia para trabajar con consultas sql, sera mas orientado a objetos, nos permites trabajar con MODELOS (son clases de nuestro proyecto que podemos generar desde la consola - php artisian make:model nombre_de_la_clase_modelo que esta en el directorio /app/Providers)
        
        // parecido a los metodos anterios, pero de esta manera ELOQUENT rellena los campos de created_at y updated_at, que anteriormente no se rellenaban

        // podemos ahorrarnos el \App importando la clase en este archivo
        //$profesionID = Profesion::where('title', 'Desarrollador Back-end')->value('id');

        /*
        User::create([

        	'name' => 'Carlos Garcia',
        	'email' => 'ejemplo@ejemplo.com',
        	'password' => bcrypt('laravel'), //encripta la contraseña
        	'profesion_id' => $profesionID,// 1º manera $profesion->id
        	'is_admin' => true
        ]);

        
        User::create([

        	'name' => 'Maria del mar',
        	'email' => 'ejemplo1@ejemplo1.com',
        	'password' => bcrypt('laravel'), //encripta la contraseña
        	'profesion_id' => $profesionID// 1º manera $profesion->id,
        ]);

        User::create([

        	'name' => 'Montserrat Prieto',
        	'email' => 'ejemplo2@ejemplo2.com',
        	'password' => bcrypt('laravel'), //encripta la contraseña
        	'profesion_id' => null// 1º manera $profesion->id,
        ]);
        */

        // otra manera de crear usuarios, 

        // el primero
        factory(User::class)->create([

        	'name' => 'Carlos Garcia', // si no queremos poner el nombre creara uno aleatorio
        	'email' => 'tulosabes1984@gmail.com',
        	'password' => bcrypt('carlos4693'), //encripta la contraseña
        	'dni' => '40330015t',
        	'id_rol' => 1,
        ]);

        // el segundo lo creara aleatorio pero con la profesion por defecto con id 1
        /*factory(User::class)->create([

        	
        ]);*/

        // el tercero que lo cree de forma aleatoria
        //factory(User::class)->create();
        factory(User::class, 5)->create([

        	'id_rol' => 2,
            'c_postal' => '03500',
            'password' => bcrypt('carlos4693'),
        ]); 

        // si le pasamos un numero como 2º argumento a factory creara tantos usuarios de prueba como numero le pongamos
        factory(User::class, 94)->create([

            'id_rol' => 3,
            'c_postal' => '03500',
            'password' => bcrypt('carlos4693'),
        ]); // si le pasamos un numero como 2º argumento a factory creara tantos usuarios de prueba como numero le pongamos
    }
}
