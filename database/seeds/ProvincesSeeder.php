<?php

use Illuminate\Database\Seeder;
use App\Provinces;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $provinces = array('Buenos Aires', 
                            'San Luis', 
                            'Cordoba', 
                            'Mendoza', 
                            'La Rioja', 
                            'Jujuy', 
                            'Catamarca', 
                            'Formoza', 
                            'Tierra del Fuego', 
                            'Misiones', 
                            'Corrientes', 
                            'Chaco', 
                            'Neuquen', 
                            'Tucuman', 
                            'Santiago del Estero', 
                            'Rio Negro', 
                            'Chubut'); 

    public function run()
    {     
        foreach($this->provinces as $key => $value){
            $region = new Provinces;
            $region->name = $value;
            $region->save();
        }   
    }
}
