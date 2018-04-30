<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Dni;

class Dni extends Model
{
    protected $table = 'dni';
    
    static public function getPuntos($id) {
        $puntos = Dni::where('id_user', '=', $id)->get();
        return $puntos[0]->puntos;
    }
    
    static public function getDni($id) {
        $dni = Dni::where('id_user', '=', $id)->get();
        return $dni[0]->dni;
    }
    
    static public function getIdUser($id_user) {
        $dni = Dni::where('id_user', '=', $id_user)->get();
        return $dni[0]->id;
    }
    
    static function getName($id_user) {
        $user = Dni::where('id_user', '=', $id_user)->get();
        return $user[0]->name." ".$user[0]->last_name;
    }
    
    static public function setIdUser($id) {
        $dniUser = Dni::find($id);
        $dniUser->id_user = 0;
        $dniUser->save();
    }
}
