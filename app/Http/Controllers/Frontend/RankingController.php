<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\ResultsCategories;
use App\BonusTrackCategories;
use App\Results;
use App\ResultsMedia;
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
        'bonus_track_categories' => BonusTrackCategories::all(),
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
        
      $imagen_destacada = ResultsMedia::where('id_category', '=',$id_category )->where('month', '=', date('n'))->orderby('id', 'DESC')->limit(1)->get();
      
      return view('frontend.results.show', [
        'months' => Functions::getMonthShortcuts(),
        'name_category' => ResultsCategories::find($id_category)->toArray(),
        'results' => $results,
        'modals' => Modals::where('active', '=', 1)->where('section', '=', $id_category)->get(),
        'imagen_destacada' => ($imagen_destacada && !empty($imagen_destacada[0]) ? $imagen_destacada[0] : '')
      ]);
    }
    
    public function resultsForMonth($id_category, $month)
    {
      if($month == "1_semestre"){
        $results = Results::where('id_category', '=', $id_category)->where('month', '<=', 6)->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      } else if($month == "2_semestre"){
        $results = Results::where('id_category', '=', $id_category)->where('month', '>=', 7)->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      } else {  
        $results = Results::where('id_category', '=', $id_category)->where('month', '=', $month)->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      }
      foreach ($results as &$result) {
        $result['user_name'] = Dni::getName($result['id_user']);
        $result['region_name'] = Regions::getName($result['id_region']);
        $result['agente_name'] = Agentes::getName(UsersProfile::getIdAgente($result['id_user']));
      }
      
      $imagen_destacada = ResultsMedia::where('id_category', '=',$id_category )->where('month', '=', $month)->orderby('id', 'DESC')->limit(1)->get();

      return response()->json(['results' => $results, 'id_category' => $id_category, 'imagen_destacada' => $imagen_destacada, 'month' => $month]);
    }
    
}
