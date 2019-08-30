<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeyDniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("dni")->select('*')->whereNotIn('id_user',function($query) {
            $query->select('id')->from('users');
        })->delete();



        Schema::table('dni', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->unique()->change();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dni', function (Blueprint $table) {
            //
        });
    }
}
