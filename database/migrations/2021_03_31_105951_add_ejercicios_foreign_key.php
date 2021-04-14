<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEjerciciosForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ejercicios', function (Blueprint $table) {
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')
                   ->references('id')->on('estados')
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
        //
    }
}
