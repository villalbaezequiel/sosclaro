<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsExchanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exchanges', function ($table) {
            $table->string('email_ml')->after('profile_ml')->nullable();
            $table->string('puntos_before_exchange')->after('email_ml')->nullable();
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
