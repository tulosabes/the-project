<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$this->truncateTable([

    		'users',
    		'roles',
            'club',
            'niveles',
            'pistas',
            'servicios',
    	]);

        // $this->call(UsersTableSeeder::class);

        $this->call(ServicioSeeder::class);
        $this->call(ClubSeeder::class); // llamar primero a la tabla sin clave foranea
        $this->call(RolesSeeder::class);
        $this->call(NivelesSeeder::class);
        $this->call(PistaSeeder::class);
        $this->call(UserSeeder::class); // luego llamar a las tablas con clave foranea, si no dara error

    }

    protected function truncateTable(array $tables){

    	// para desactivar la revision de claves foraneas, para evitar que nos de el error de llave foranea, usamos "statement", para evitar la revision de llaves foraneas de nuestra base de datos, esto se ejecutara antes de enviar la orden de vaciar la tabla profesions
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    	foreach ($tables as $table) {
    		
    		// permite vaciar la tabla antes de volver a meter estos datos, de esta manera no nos dara el error de datos duplicados, y si nos dara error de llave foranea
    		DB::table($table)->truncate();
    	}

    	// para activar la revision de claves foraneas, una vez que haya sido eliminada la tabla
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
