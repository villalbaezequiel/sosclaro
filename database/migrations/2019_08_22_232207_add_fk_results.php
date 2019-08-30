<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->integer('id_category')->unsigned()->change();
            $table->foreign('id_category')->references('id')->on('categories');
            $table->integer('id_user')->unsigned()->change();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_region')->unsigned()->change();
            $table->foreign('id_region')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            //
        });
    }
}
