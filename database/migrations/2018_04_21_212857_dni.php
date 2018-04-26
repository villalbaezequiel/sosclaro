<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Itec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni');
            $table->string('name');
            $table->string('last_name');
            $table->string('puntos');
            $table->string('indicador');
            $table->integer('id_user');
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
        Schema::drop('dni');
    }
}
