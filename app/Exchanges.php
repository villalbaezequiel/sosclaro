<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exchanges;

class Exchanges extends Model
{
    protected $table = 'exchanges';
    
    static public function getStatus($status) {
        if($status == 0){
            return "Pendiente";
        } elseif($status == 1){
            return "En Transito";
        } elseif ($status == 2) {
            return "Completo";
        }
    }    
    
}
