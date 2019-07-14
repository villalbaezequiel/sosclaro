<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;

class Cities extends Model
{
    protected $table = 'cities';
    
    static public function getName($id) {
        $name = Cities::find($id);
        if(isset($name)){ 
            return $name->name;
        } else {
            return "No estás asignado a ninguna Localidad/Ciudad";
        }
    }
    
    static public function checkCitie($name){
        $citie = Cities::where('name', '=', $name)->get();
        if(isset($citie[0])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    static public function getIdForName($name){
        $citie = Cities::where('name', '=', $name)->get();
        if(isset($citie[0])){
            return $citie[0]->id;
        }
    }
}
