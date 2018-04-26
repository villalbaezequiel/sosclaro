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
    
    public $regions = array('Capital e Interior', 
                            'AMBA Norte e Interior', 
                            'AMBA Oeste e Interior', 
                            'AMBA Sur e Interior', 
                            'Litoral', 
                            'Med - NOA', 
                            'Sur'); 

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
