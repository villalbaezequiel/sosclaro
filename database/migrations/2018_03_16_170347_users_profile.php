<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_city');
            $table->string('avatar');
            $table->string('name');
            $table->string('lastname');
            $table->string('dni');
            $table->string('telephone');
            $table->string('telephone_other');
            $table->string('address');
            $table->string('address_other');
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
        Schema::drop('users_profile');
    }
}
