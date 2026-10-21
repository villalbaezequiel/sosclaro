<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionsSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
