<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNivelIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            
            $table->integer('id_nivel')->unsigned()->default(1)->after('id_rol');
            $table->foreign('id_nivel')->references('id')->on('niveles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            
            //$table->dropForeign(['id_rol']);
            //$table->dropColumn('rol_id');
        });
    }
}
