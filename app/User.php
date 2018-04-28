<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Dni;

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
    
    static function getName($id) {
        $user = Dni::find($id);
        return $user->name." ".$user->last_name;
    }
    
    public function latestUsersProfile()
    {
        return $this->hasMany(UsersProfile::class, 'id_user')->limit(10);
    }
}
