<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    static public function print_x($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    
    static public function getActive($param) {
        if($param == 1){
            echo "Si";
        } elseif($param == 0){
            echo "No";
        }
    }
    
    static function getDate($param) {
        $date = explode("-", substr("$param", 0, -9));
        return $date[2]."/".$date[1]."/".$date[0];
    }
}
