<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigosFanbag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos_fanbag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fanbag');
            $table->string('codigo_fanbag');
            $table->integer('active')->lenght(1);
            $table->date('expire');
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
        Schema::drop('codigos_fanbag');
    }
}
