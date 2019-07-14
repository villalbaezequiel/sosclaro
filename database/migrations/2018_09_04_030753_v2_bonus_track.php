<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class V2BonusTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_track', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category');
            $table->integer('id_user');
            $table->integer('id_region');
            $table->string('puntos');
            $table->string('desempeno');
            $table->string('puesto');
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
        Schema::drop('bonus_track');
    }
}
