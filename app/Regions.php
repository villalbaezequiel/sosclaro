<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Regions;


class Regions extends Model
{
    protected $table = 'regions';
    
    static public function getName($id) {
        $name = Regions::find($id);
        if(isset($name)){ 
            return $name->name;
        }
    }
    
}
