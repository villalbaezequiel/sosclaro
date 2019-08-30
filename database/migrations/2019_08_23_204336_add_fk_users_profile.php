<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table("users_profile")->select('*')->whereNotIn('id_user',function($query) {
            $query->select('id')->from('users');
        })->delete();

        DB::table("users_profile")->select('*')->whereNotIn('id_dni',function($query) {
            $query->select('id')->from('dni');
        })->delete();


/*
        DB::table("users_profile")->select('*')->whereNotIn('id_agente',function($query) {
            $query->select('id')->from('agentes');
        })->delete();

        DB::table("users_profile")->select('*')->whereNotIn('id_province',function($query) {
            $query->select('id')->from('provinces');
        })->delete();

        DB::table("users_profile")->select('*')->whereNotIn('id_city',function($query) {
            $query->select('id')->from('cities');
        })->delete();

        DB::table("users_profile")->select('*')->whereNotIn('id_region',function($query) {
            $query->select('id')->from('regions');
        })->delete();

        DB::table("users_profile")->select('*')->whereNotIn('id_role',function($query) {
            $query->select('id')->from('roles');
        })->delete();*/

//        Schema::table('cities', function (Blueprint $table) {
//            $table->integer('id')->unsigned()->unique()->change();
//        });



        Schema::table('users_profile', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->unique()->change();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_dni')->unsigned()->unique()->change();
            $table->foreign('id_dni')->references('id')->on('dni');
            /*$table->foreign('id_agente')->references('id')->on('agentes');
            $table->integer('id_province')->unsigned()->change();
            $table->foreign('id_province')->references('id')->on('provinces');
            $table->integer('id_city')->unsigned()->change();
            $table->foreign('id_city')->references('id')->on('city');
            $table->integer('id_region')->unsigned()->change();
            $table->foreign('id_region')->references('id')->on('regions');
            $table->integer('id_role')->unsigned()->change();
            $table->foreign('id_role')->references('id')->on('roles');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_profile', function (Blueprint $table) {
            //
        });
    }
}
