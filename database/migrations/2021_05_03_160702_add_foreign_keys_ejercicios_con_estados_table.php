<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysEjerciciosConEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ejercicio_Con_Estados', function (Blueprint $table) {
            $table->foreign('estado_id')
                   ->references('id')->on('estados')
                   ->onDelete("cascade")
                   ->onUpdate("cascade");

            $table->foreign('ejercicio_id')
                ->references('id')->on('ejercicios')
                ->onDelete("cascade")
                ->onUpdate("cascade");
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ejercicio_Con_Estados', function (Blueprint $table) {
            //
        });
    }
}
