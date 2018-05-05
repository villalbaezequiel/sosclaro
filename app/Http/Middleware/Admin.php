<?php

namespace App\Http\Middleware;

use Closure;
use App\UsersProfile;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            $user = Auth::user();
            $roleAdmin = UsersProfile::where('id_user', '=', $user->id)->get()->toArray(); 
            
            if($roleAdmin[0]['id_role'] == 1):
                 return $next($request); 
            endif; 
        } 
       return redirect('/'); 
    }
}
