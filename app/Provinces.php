<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provinces;

class Provinces extends Model
{
    protected $table = 'provinces';

    static public function getProvince($id_province) {
        $province = Provinces::find($id_province);
        return $province->name;
    }
    
    static public function checkProvince($name){
        $province = Provinces::where('name', '=', $name)->get();
        if(isset($province[0])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    static public function getIdForName($name){
        $province = Provinces::where('name', '=', $name)->get();
        if(isset($province[0])){
            return $province[0]->id;
        }
    }
    
    static public function getName($id) {
        $name = Provinces::find($id);
        if(isset($name)){ 
            return $name->name;
        } else {
            return "No estás asignado a ninguna Provincia";
        }
    }
}
