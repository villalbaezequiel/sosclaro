<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

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
    
    public function latestUsersProfile()
    {
        return $this->hasMany(UsersProfile::class, 'id_user')->limit(10);
    }
}
