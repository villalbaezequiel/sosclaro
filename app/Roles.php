<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    private static $sections = array(
                            "section_roles" => "Roles", 
                            "section_user" => "Usuarios", 
                            "section_settings" => "Configuracion"
                    );
    
    static public function getListPermissions($selected_permissions = null) {
        $sections = static::$sections;
        
        if($selected_permissions){
            $select_permissions = json_decode($selected_permissions);
        }
        
        foreach ($sections as $key => $value) {
            if(isset($select_permissions)){
                $selected = "";
                foreach ($select_permissions as $check_permission) {
                    if($check_permission == $key){
                        $selected = "selected='selected'";
                    }
                }
                echo "<option value='$key' $selected>$value</option>";   
            } else {
                echo "<option value='$key'>$value</option>";   
            }
        }
    }
    
    static public function getPermissions($param) {
        $permissons = '';

        foreach (json_decode($param) as $value) {
            $permissons .= $value.", ";
        }
        return substr($permissons, 0, -2);
    }
}
