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
        //DB::table('products')->insert(['id' => 9999, 'codigo' => 99999999, 'id_category' => 1, 'name' => 'Producto borrado', 'active' => 0]);

        $exchanges_sin_producto = DB::table("exchanges")->select('*')->whereNotIn('id_product',function($query) {
            $query->select('id')->from('products');
        })->get();

        foreach ($exchanges_sin_producto as $exchange_sin_producto) {
            $exchange = \App\Exchanges::find($exchange_sin_producto->id);
            $exchange->id_product = 9999;
            $exchange->save();
        }

        /*
        DB::table("exchanges")->select('*')->whereNotIn('id_user',function($query) {
            $query->select('id')->from('users');
        })->delete();*/

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
