<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GuestQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_guest');
            $table->string('question');
            $table->string('options', 5000);
            $table->integer('order');
            $table->string('type_input');
            $table->enum('active', ['0', '1']);
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
        Schema::drop('guest_questions');
    }
}
