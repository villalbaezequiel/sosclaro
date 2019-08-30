<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('id_category');
            $table->string('name');
            $table->string('description', 2500);
            $table->string('politica_legal', 5000);
            $table->string('image');
            $table->integer('price');
            $table->integer('stock');
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
        Schema::drop('products');
    }
}
