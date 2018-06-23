<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Regions;
use App\UsersProfile;
use App\Dni;

class RankingController extends Controller
{
    public function index() {
        
        $posicionNacional= DB::table('dni')
                        ->select('id', 'id_user', 'historical_performance')
                        ->where('id_user', '!=', 0)
                        ->where('historical_performance', '!=', 0)
                        ->orderBy('historical_performance', 'desc')
                        ->get();
        
        $historical_performance = "";
                
        foreach($posicionNacional as $key => $value){
            if($value->id_user == Auth::user()->id){
                $historical_performance = ($key+1);
            }
        }
        
        $id_region = Dni::getRegion(Auth::user()->id);
        
        $posicionRegion = DB::table('dni')
                        ->select('id', 'id_region', 'id_user', 'historical_puntos')
                        ->where('id_region', '=', $id_region)
                        ->where('id_user', '!=', 0)
                        ->where('historical_puntos', '!=', 0)
                        ->orderBy('historical_puntos', 'desc')
                        ->get();
        
        $historical_region = "";
        
        foreach($posicionRegion as $key => $value){
            if($value->id_user == Auth::user()->id){
                $historical_region = ($key+1);
            }
        }
        
        return view('frontend.ranking', [
            'regions' => Regions::all(),
            'historical_region' => $historical_region,
            'region_name' => Regions::getName($id_region),
            'historical_performance' => $historical_performance
        ]);
    }
    
    public function ajax($id_region) {
        $users = array();
        
        if($id_region == 69696){
            $id_region_auth_user = Dni::getRegion(Auth::user()->id);
            $users_region = DB::table('dni')
                            ->where('id_region', '=', $id_region_auth_user)
                            ->where('historical_puntos', '!=', 0)
                            ->where('id_user', '!=', 1)
                            ->orderBy('historical_puntos', 'DESC')
                            ->limit(10)
                            ->get();
        } else {
            $users_region = DB::table('dni')
                            ->where('id_region', '=', $id_region)
                            ->where('historical_puntos', '!=', 0)
                            ->where('id_user', '!=', 1)
                            ->orderBy('historical_puntos', 'DESC')
                            ->limit(10)
                            ->get();    
        }
        
        
        foreach ($users_region as $key => $value) {
            $users[] = array('puesto' => ($key+1), 'name' => Dni::getName($value->id_user),'puntos' => Dni::getPuntosHistorical($value->id_user));
        }
        return response()->json(['usuarios' => $users]);
    }
}
