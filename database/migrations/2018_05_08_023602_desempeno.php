<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Desempeno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desempeno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dni');
            $table->string('name_lastname');
            $table->integer('id_region');
            $table->string('puntos');
            $table->string('indicador_1');
            $table->string('indicador_2');
            $table->string('promedio');
            $table->string('especification');
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
        Schema::drop('desempeno');
    }
}
