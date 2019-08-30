<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    protected $table = 'agentes';
    
    static public function checkAgente($name){
        $agente = Agentes::where('name', '=', $name)->get();
        if(isset($agente[0])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    static public function getIdForName($name){
        $agente = Agentes::where('name', '=', $name)->get();
        if(isset($agente[0])){
            return $agente[0]->id;
        }
    }

    static public function getName($id) {
        $name = Agentes::find($id);
        if(isset($name)){ 
            return $name->name;
        } else {
            return "No estás asignado a ningun Agente";
        }
    }
}
