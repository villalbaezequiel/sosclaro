<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\BonusTrackCategories;
use App\BonusTrack;
use App\BonusTrackMedia;
use App\Dni;
use App\Agentes;
use App\Regions;
use App\UsersProfile;

class BonusTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_category)
    {
      $results = BonusTrack::where('id_category', '=', $id_category)->where('month', '=', date('n'))->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      foreach ($results as &$result) {
        $result['user_name'] = Dni::getName($result['id_user']);
        $result['region_name'] = Regions::getName($result['id_region']);
        $result['agente_name'] = Agentes::getName(UsersProfile::getIdAgente($result['id_user']));
      }
      
      $imagen_destacada = BonusTrackMedia::where('id_category', '=',$id_category )->where('month', '=', date('n'))->orderby('id', 'DESC')->limit(1)->get()->toArray();
        
      return view('frontend.bonus_track.show', [
        'months' => Functions::getMonthShortcuts(),
        'name_category' => BonusTrackCategories::find($id_category)->toArray(),
        'results' => $results,
        'imagen_destacada' => $imagen_destacada  
      ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function resultsForMonth($id_category, $month)
    {
      $results = BonusTrack::where('id_category', '=', $id_category)->where('month', '=', $month)->orderby('puesto', 'ASC')->orderby('puntos', 'DESC')->limit(15)->get()->toArray();
      
      foreach ($results as &$result) {
        $result['user_name'] = Dni::getName($result['id_user']);
        $result['region_name'] = Regions::getName($result['id_region']);
        $result['agente_name'] = Agentes::getName(UsersProfile::getIdAgente($result['id_user']));
      }
      
      $imagen_destacada = BonusTrackMedia::where('id_category', '=',$id_category )->where('month', '=', $month)->orderby('id', 'DESC')->limit(1)->get();
      
      return response()->json(['results' => $results, 'imagen_destacada' => $imagen_destacada]);
    }
}
