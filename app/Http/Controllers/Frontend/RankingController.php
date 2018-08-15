<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\ResultsCategories;
use App\Results;
use App\Modals;

class RankingController extends Controller
{
    public function index()
    {
      return view('frontend.results', [
        'results_categories' => ResultsCategories::all(),
        'modals' => Modals::where('active', '=', 1)->get()
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
            $users[] = array('id_user' => $value->id_user, 'puesto' => ($key+1), 'name' => Dni::getName($value->id_user),'puntos' => Dni::getPuntosHistorical($value->id_user));
        }
        return response()->json(['usuarios' => $users]);
    }
}
