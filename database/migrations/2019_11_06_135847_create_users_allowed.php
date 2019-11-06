<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAllowed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_allowed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dni');
            $table->string('name');
            $table->string('last_name');
            $table->string('address');
            $table->integer('postal_code');
            $table->string('city');
            $table->integer('id_province')->unsigned();
            $table->foreign('id_province')->references('id')->on('provinces');
            $table->integer('id_region')->unsigned();
            $table->foreign('id_region')->references('id')->on('regions');
            $table->integer('id_agency')->unsigned();
            $table->foreign('id_agency')->references('id')->on('agentes');
            $table->date('admission_date');
            $table->string('type_user');
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
        Schema::drop('users_allowed');
    }
}
