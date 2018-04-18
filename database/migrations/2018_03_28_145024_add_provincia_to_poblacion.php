<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinciaToPoblacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   /* public function up()
    {
        Schema::table('poblaciones', function(Blueprint $table) {
            
            $table->integer('id_provincia')->unsigned()->default(9)->after('id');
            $table->foreign('id_provincia')->references('id')->on('provincias');
        });
    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
