<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteIdEstadoEjerciciosTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('ejercicios', function (Blueprint $table) {
            $table->dropForeign('ejercicios_estados_id_foreign');
            $table->dropColumn('estados_id');
         });
    }
        
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('ejercicios', function (Blueprint $table) {
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')
                   ->references('id')->on('estados')
                   ->onDelete("cascade")
                   ->onUpdate("cascade");
        });
    }
}
