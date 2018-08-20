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
use App\Dni;
use App\Agentes;
use App\Regions;
use App\UsersProfile;

class RankingController extends Controller
{
    public function index()
    {
      return view('frontend.results.index', [
        'results_categories' => ResultsCategories::all(),
        'modals' => Modals::where('active', '=', 1)->get()
      ]);
    }

    public function show($id_category)
    {
      $results = Results::where('id_category', '=', $id_category)->where('month', '=', date('n'))->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      foreach ($results as &$result) {
        $result['user_name'] = Dni::getName($result['id_user']);
        $result['region_name'] = Regions::getName($result['id_region']);
        $result['agente_name'] = Agentes::getName(UsersProfile::getIdAgente($result['id_user']));
      }
        
      return view('frontend.results.show', [
        'months' => Functions::getMonthShortcuts(),
        'name_category' => ResultsCategories::find($id_category)->toArray(),
        'results' => $results,
        'modals' => Modals::where('active', '=', 1)->where('section', '=', $id_category)->get()
      ]);
    }
    
    public function resultsForMonth($id_category, $month)
    {
      $results = Results::where('id_category', '=', $id_category)->where('month', '=', $month)->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      foreach ($results as &$result) {
        $result['user_name'] = Dni::getName($result['id_user']);
        $result['region_name'] = Regions::getName($result['id_region']);
        $result['agente_name'] = Agentes::getName(UsersProfile::getIdAgente($result['id_user']));
      }
      return response()->json(['results' => $results]);
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
