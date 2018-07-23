<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreguntasFrecuentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('preguntas_frecuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pregunta', 255)->nullable();
            $table->string('respuesta', 5000)->nullable();
            $table->enum('active', [0,1])->nullable();
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
        Schema::drop('preguntas_frecuentes');
    }
}
