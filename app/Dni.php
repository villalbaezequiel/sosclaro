<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dni extends Model
{
    protected $table = 'dni';

    /**
     * Get the user that owns the dni.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    static public function getPuntos($id) {
        $puntos = Dni::where('id_user', '=', $id)->get();
        if(isset($puntos[0])){
            return $puntos[0]->puntos;
        }
    }

    static public function getPuntosHistorical($id) {
        $puntos = Dni::where('id_user', '=', $id)->get();
        if(isset($puntos[0])){
            return $puntos[0]->historical_puntos;
        }
    }

    static public function getDni($id) {
        $dni = Dni::where('id_user', '=', $id)->get();
        if(isset($dni[0])){
            return $dni[0]->dni;
        }
    }

    static public function getRegion($id_user) {
        $dni = Dni::where('id_user', '=', $id_user)->get();
        if(isset($dni[0])){
            return $dni[0]->id_region;
        }
    }

    static public function getIdDni($dni) {
        $dni_id = Dni::where('dni', '=', $dni)->get();
        return $dni_id[0]->id;
    }

    static public function getIdUser($id_user) {
        $dni = Dni::where('id_user', '=', $id_user)->get();
        return $dni[0]->id;
    }

    static function getName($id_user) {
        $user = Dni::where('id_user', '=', $id_user)->get();
        if(isset($user[0])){
            return $user[0]->name." ".$user[0]->last_name;
        }
    }

    static function getNameShort($id_user) {
        $user = Dni::where('id_user', '=', $id_user)->get();
        return $user[0]->name;
    }

    static public function setIdUser($id) {
        $dniUser = Dni::find($id);
        $dniUser->id_user = 0;
        $dniUser->save();
    }

    static function getHistoricalPerformance($id_user){
        $historical_performance = Dni::where('id_user', '=', $id_user)->get();
        if(isset($historical_performance[0])){
            return $historical_performance[0]->historical_performance;
        }
    }
}
