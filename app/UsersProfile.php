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
    
    static public function getCountUsersRole($id_role) {
        $countUsers = UsersProfile::where('id_role', '=', $id_role)->count();
        if($countUsers == 0){
            return "No hay Usuarios Asociados.";
        } else {
            return $countUsers;
        }
    }
    
    static public function getRole($id_user) {
        $role = UsersProfile::where('id_user', '=', $id_user)->get();
        if(!empty($role[0])){
            return $role[0]->id_role;
        }
    }
    
}
