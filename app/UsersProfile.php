<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;

class UsersProfile extends Model
{
    protected $table = 'users_profile';
    
    static public function getCityUser($id_city) {
        $cityUser = Cities::where('id', '=', $id_city)->get();
        return $cityUser[0]->name;
    }
    
}
