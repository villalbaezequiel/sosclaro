<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password',
    ];
        
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the usersProfile record associated with the user.
     */
    public function usersProfile()
    {
        return $this->hasOne('App\UsersProfile');
    }

    /**
     * Get the dni record associated with the user.
     */
    public function dni()
    {
        return $this->hasOne('App\Dni');
    }

    /**
     * Get the bonusTracks for the user.
     */
    public function bonusTracks()
    {
        return $this->hasMany('App\BonusTrack');
    }

    /**
     * Get the exchanges for the user.
     */
    public function exchanges()
    {
        return $this->hasMany('App\Exchanges');
    }

    /**
     * Get the guestUsers for the user.
     */
    public function guestUsers()
    {
        return $this->hasMany('App\GuestUsers');
    }

    /**
     * Get the results for the user.
     */
    public function results()
    {
        return $this->hasMany('App\Results');
    }
    
    static public function getEmail($id_user){
      $user = User::where('id', '=', $id_user)->get();
      if(isset($user[0])){ 
        return $user[0]->email;
      }
    }
}
