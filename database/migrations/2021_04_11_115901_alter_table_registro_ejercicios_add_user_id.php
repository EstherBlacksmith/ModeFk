<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRegistroEjerciciosAddUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_ejercicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('ejercicio_id');
            $table->foreign('ejercicio_id')
                ->references('id')->on('ejercicios')
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete("cascade")
                  ->onUpdate("cascade");    
            $table->datetime('ejercicioHecho')->useCurrent();
        });

   
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
