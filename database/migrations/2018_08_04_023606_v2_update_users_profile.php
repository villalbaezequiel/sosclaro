<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class V2UpdateUsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_profile', function ($table) {
            $table->integer('id_agente')->after('id_dni');
            $table->integer('id_province')->after('id_agente');
            $table->string('cp')->after('address');
            $table->string('type_user')->after('id_role');
            $table->string('admission_date')->after('type_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
