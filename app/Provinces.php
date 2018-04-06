<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'provinces';

    static public function getProvince($id_province) {
        $province = Provinces::find($id_province);
        return $province->name;
    }
}
