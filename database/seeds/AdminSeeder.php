<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Usuario admin para desarrollo local.
     * Login: admin@sosclaro.test / password
     */
    public function run()
    {
        $now = now();
        $email = 'admin@sosclaro.test';

        if (DB::table('users')->where('email', $email)->exists()) {
            return;
        }

        $idUser = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make('password'),
            'active' => '1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $idDni = DB::table('dni')->insertGetId([
            'dni' => '00000000',
            'name' => 'Admin',
            'last_name' => 'Sos Claro',
            'puntos' => '0',
            'indicador' => '',
            'id_user' => $idUser,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users_profile')->insert([
            'id_user' => $idUser,
            'id_dni' => $idDni,
            'id_agente' => 0,
            'id_province' => (int) DB::table('provinces')->value('id'),
            'id_city' => 0,
            'id_region' => (int) DB::table('regions')->value('id'),
            'id_role' => (int) DB::table('roles')->where('name', 'admin')->value('id'),
            'type_user' => '',
            'admission_date' => '',
            'sexo' => 'male',
            'date_year' => '',
            'avatar' => '',
            'telephone' => '',
            'telephone_other' => '',
            'address' => '',
            'cp' => '',
            'status' => '1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
