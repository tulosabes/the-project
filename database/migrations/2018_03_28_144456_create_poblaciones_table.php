<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoblacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*public function up()
    {
        Schema::create('poblaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('poblacion', 150);
            $table->string('poblacionseo',150);
            $table->integer('c_postal')->default(03500);
            $table->double('latitud');
            $table->double('longitud');
            $table->timestamps();
        });
    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('poblaciones');
    }*/
}
