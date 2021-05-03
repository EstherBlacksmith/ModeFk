<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioConEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_con_estados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedInteger('ejercicio_id');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio_con_estados');
    }
}
