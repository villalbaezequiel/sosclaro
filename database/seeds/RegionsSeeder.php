<?php

use Illuminate\Database\Seeder;
use App\Regions;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public $regions = array('AMBA NORTE', 
                            'AMBA SUR', 
                            'BALP', 
                            'CABA', 
                            'CUYO', 
                            'LINO', 
                            'LISU', 
                            'MEDI', 
                            'NOA', 
                            'PATAGONIA'); 

    public function run()
    {     
        foreach($this->regions as $key => $value){
            $region = new Regions;
            $region->name = $value;
            $region->active = 1;
            $region->save();
        }   
    }
}
