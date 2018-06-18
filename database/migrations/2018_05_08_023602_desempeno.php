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
            $table->integer('id_user');
            $table->integer('indicador_1');
            $table->integer('indicador_2');
            $table->integer('promedio');
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
