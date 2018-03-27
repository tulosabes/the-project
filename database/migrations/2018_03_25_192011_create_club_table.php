<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique();
            $table->string('email')->unique(); // varchar - unico
            $table->integer('telefono')->default(000000000);
            $table->string('direccion', 50); // varchar
            $table->string('poblacion', 20)->default('Benidorm');
            $table->string('provincia', 20)->default('Alicante');
            $table->integer('c_postal')->default(03500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club');
    }
}
