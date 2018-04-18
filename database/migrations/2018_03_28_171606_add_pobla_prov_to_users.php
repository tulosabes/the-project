<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoblaProvToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('users', function(Blueprint $table) {
            
            $table->integer('id_provincia')->unsigned()->default(9)->after('direccion');
            $table->foreign('id_provincia')->references('id')->on('provincia');
        });

        Schema::table('users', function(Blueprint $table) {
            
            $table->integer('id_poblacion')->unsigned()->default(181)->after('direccion');
            $table->foreign('id_poblacion')->references('id')->on('poblacion');
        });*/
    }

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
