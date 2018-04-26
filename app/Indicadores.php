<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $table = 'indicadores';
    
    static public function getNameJson($ids) {
        
        $listIndic = "";
        $indicadores = json_decode($ids);
        foreach ($indicadores as $key => $value) {
            $indic = Indicadores::find($value);
            $listIndic .= $indic->name.', ';
        }
        
        return $listIndic;
        
    }
}
