<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $roles = array(['name' => 'admin', 'permission' => 'Acceso Total Administrador'], 
                          ['name' => 'user', 'permission' => 'Usuario final. Cliente Claro'], 
                          ['name' => 'moderator_products_canjes', 'permission' => 'Acceso a Administrador para crear Productos/Categorias y los Canjes ']); 

    public function run()
    {     
        foreach($this->roles as $value){
            $region = new Roles;
            $region->name = $value['name'];
            $region->permission = $value['permission'];
            $region->active = 1;
            $region->save();
        }   
    }
}
