<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestUsers;

class GuestUsers extends Model
{
    protected $table = 'guest_users';
    
    static function getCheckGuest($id_user, $id_guest) {
        $checkUser = GuestUsers::where('id_user', '=', $id_user)
                    ->where('id_guest', '=', $id_guest)
                    ->get()
                    ->toArray();
        if(!empty($checkUser[0])){
            return true;
        }
    }
}
