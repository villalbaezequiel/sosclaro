<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkGuestQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guest_questions', function (Blueprint $table) {
            $table->integer('id_guest')->unsigned()->change();
            $table->foreign('id_guest')->references('id')->on('guest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guest_questions', function (Blueprint $table) {
            //
        });
    }
}
