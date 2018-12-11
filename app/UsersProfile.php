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
    
    static public function getStatus($id_user) {
        $status = UsersProfile::where('id_user', '=', $id_user)->get();
        if(!empty($status[0])){
            return $status[0]->status;
        }
    }
    
    static public function getIdRegion($id_user) {
        $status = UsersProfile::where('id_user', '=', $id_user)->get();
        if(!empty($status[0])){
            return $status[0]->id_region;
        }
    }
    
    static public function getIdForIdDni($id_dni) {
        $id = UsersProfile::where('id_dni', '=', $id_dni)->get();
        if(!empty($id[0])){
            return $id[0]->id;
        }
    }
    
    static public function getDateYear($date_year) {
      $date = json_decode($date_year);
      return $date[0]."/".$date[1]."/".$date[2];
    }
    
    static public function getIdAgente($id_user) {
      $id_agente = UsersProfile::where('id_user', '=', $id_user)->get();
      if(!empty($id_agente[0])){
        return $id_agente[0]->id_agente;
      }
    }
    
    static public function getTypeUser($id_user){
      $type_user = UsersProfile::where('id_user', '=', $id_user)->get();
      if(!empty($type_user[0])){
            return $type_user[0]->type_user;
      }
    }
    
    static public function getListUsersByTypeUser($type_user, $id_user){
        
      $listUsers = array();        
      if($type_user == 'SUPERVISOR' || $type_user == 'supervisor' || $type_user == 'Supervisor'){
        
        $id_agente = UsersProfile::getIdAgente($id_user);
        $queryUsersByRole = UsersProfile::where('id_agente', '=', $id_agente)->where('type_user', 'like', "%vendedor%")->get()->toArray();
        
        foreach($queryUsersByRole as $value){
          if($value['id_user'] != 0){
            array_push($listUsers, $value['id_user']);
          }
        }
      }
        
      if($type_user == 'GERENTE' || $type_user == 'gerente' || $type_user == 'Gerente'){
        
        $id_region = UsersProfile::getIdRegion($id_user);
        $queryUsersByRole = UsersProfile::where('id_region', '=', $id_region)->where('type_user', 'not like', "%gerente%")->get()->toArray();
        
        foreach($queryUsersByRole as $value){
          if($value['id_user'] != 0){
            array_push($listUsers, $value['id_user']);
          }
        }
      }
      
      return $listUsers;
    }
    
}
