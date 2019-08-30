<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GuestUsers extends Model
{
    protected $table = 'guest_users';

    /**
     * Get the user that owns the guest user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the guest that owns the guest user.
     */
    public function guest()
    {
        return $this->belongsTo('App\Guest');
    }
    
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
