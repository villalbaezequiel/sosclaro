<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;

class Cities extends Model
{
    protected $table = 'cities';
    
    static public function getName($id) {
        $name = Cities::find($id);
        return $name->name; 
    }
}
