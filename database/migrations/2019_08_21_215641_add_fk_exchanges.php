<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkExchanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("exchanges")->select('*')->whereNotIn('id_product',function($query) {
            $query->select('id')->from('products');
        })->delete();

        DB::table("exchanges")->select('*')->whereNotIn('id_user',function($query) {
            $query->select('id')->from('users');
        })->delete();

        Schema::table('exchanges', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->change();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_product')->unsigned()->change();
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exchanges', function (Blueprint $table) {
            //
        });
    }
}
