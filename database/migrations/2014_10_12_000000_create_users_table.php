<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // integer sin signo - autoincremento
            $table->string('name',30); // varchar
            $table->string('apellidos', 50)->nullable();
            $table->string('password', 60); // varchar
            $table->string('dni',9);
            $table->string('email')->unique(); // varchar - unico
            $table->string('telefono', 9)->unique();
            $table->string('direccion', 50)->nullable(); // varchar
            //$table->string('poblacion', 20)->nullable()->default('Benidorm');
            //$table->string('provincia', 20)->nullable()->default('Alicante');
            $table->integer('c_postal')->nullable()->default(03500);  
            $table->rememberToken(); // una manera de almacenar un token con el cual recordara a los usuarios, para cuando los usuarios vuelvan a entrar a la pagina o a la aplicacion
            $table->timestamps(); // marcas de tiempo, y se declara 2 columnas "created_at" () y "updated_at" (), las dos columnas pueden tener valor null, este metodo permite juntar dos lineas de codigo en 1 (timestamps)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
