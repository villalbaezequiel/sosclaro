<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dni;

class Dni extends Model
{
    protected $table = 'dni';
    
    static public function getPuntos($id) {
        $puntos = Dni::find($id);
        return $puntos->puntos;
    }
}
