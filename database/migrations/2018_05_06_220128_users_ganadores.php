<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersGanadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ganadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_region');
            $table->enum('mes', ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio']);
            $table->string('puesto');
            $table->string('nombre');
            $table->string('puntos');
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
        Schema::drop('users_ganadores');
    }
}
