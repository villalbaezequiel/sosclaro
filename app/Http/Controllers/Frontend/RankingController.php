<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regions;
use App\UsersProfile;
use App\Dni;


class RankingController extends Controller
{
    public function index() {
        return view('frontend.ranking', [
            'regions' => Regions::all()
        ]);
    }
    
    public function ajax($id_region) {
        $users = array();
        
        $users_region = UsersProfile::where('id_region', '=', $id_region)->orderBy('puntos_history', 'DESC')->get();
        
        foreach ($users_region as $key => $value) {
            $users[] = array('puesto' => ($key+1), 'name' => Dni::getName($value['id_user']),'puntos' => $value['puntos_history']);
        }
        return response()->json(['usuarios' => $users]);
    }
}
