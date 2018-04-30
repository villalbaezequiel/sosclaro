<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;
use App\UsersProfile;

class UsersProfile extends Model
{
    protected $table = 'users_profile';
    
    static public function getCityUser($id_city) {
        $cityUser = Cities::where('id', '=', $id_city)->get();
        return $cityUser[0]->name;
    }
    
    static public function getIdUser($id_user) {
        $cityUser = UsersProfile::where('id_user', '=', $id_user)->get();
        if(!empty($cityUser[0])){
            return $cityUser[0]->id;
        }
    }
    
}
