<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\BonusTrackCategories;
use App\BonusTrack;
use App\Dni;
use App\Regions;
use App\Agentes;
use App\UsersProfile;
use App\UsersGanadores;
use App\BonusTrackMedia;

class BonusTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.bonus_track.index', [
            'bonus_track' => BonusTrack::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bonus_track.create', [
            'months' => Functions::getMonths(),
            'categories_bonus_track' => BonusTrackCategories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $message;
        try {
          if($request->hasFile('file_bonus_track')){
            $path = $request->file('file_bonus_track')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            $values = array();
            
            if(!empty($data) && $data->count()){

              foreach ($data as $key => $value) {
                if(!empty($value->puntos)
                        && !empty($value->desempeno)
                        && !empty($request->get('category_bonus_track'))
                        && !empty($request->get('month_bonus_track')) ){
                  
                  $asunto = (!empty($request->get('asunto')) ? "Bonus Track - ".$request->get('asunto')." (Mes ".$request->get('month_bonus_track').")" : "Bonus Track - ".BonusTrackCategories::getNameCategory($request->get('category_bonus_track'))." (Mes ".$request->get('month_bonus_track').")" );
                  
                  $values[] = 
                    array(
                      'id_user' => $value->id_user,
                      'id_region' => ($value->id_region == null ? 0 : $value->id_region),
                      'id_category' => $request->get('category_bonus_track'),
                      'dni' => $value->dni,
                      'nombre_apellido' => $value->nombre_apellido,
                      'asunto' => $asunto,
                      'month' => $request->get('month_bonus_track'),
                      'puntos' => $value->puntos,
                      'desempeno' => $value->desempeno,
                      'puesto' => ($value->puesto == null ? 0 : $value->puesto) );
                } 
              }
              
              // excepcion de carga de Bonus Track por problema de request por GET
              $listBonusTracks = $values;
              
              if(!empty($listBonusTracks)){
                foreach($listBonusTracks as $val) {

                  $value = (object) $val;
                    
                  //insert new performance
                  $insert = new UsersGanadores;
                  $insert->id_user = $value->id_user;
                  $insert->indicador_1 = 0;
                  $insert->indicador_2 = 0;
                  $insert->promedio = 0;
                  $insert->total = 0;

                  $insert->puntos = $value->puntos;
                  $insert->asunto = $value->asunto;
                  $insert->save();

                  //actualizo DESEMPENO HISTORICO DEL USER
                  $historical_performance = Dni::find(Dni::getIdUser($value->id_user));
                  $historical_performance->puntos = ($historical_performance->puntos + $value->puntos);
                  $historical_performance->historical_puntos = ($historical_performance->historical_puntos + $value->puntos);
                  $historical_performance->save();


                  $bonus_track = new BonusTrack;
                  $bonus_track->id_category = $value->id_category;
                  $bonus_track->month = $value->month;
                  $bonus_track->id_user = $value->id_user;
                  $bonus_track->id_region = $value->id_region;
                  $bonus_track->puntos = $value->puntos;
                  $bonus_track->desempeno = $value->desempeno;
                  $bonus_track->puesto = (!empty($value->puesto) ? $value->puesto : 0);
                  $bonus_track->save();
                }
              }
              
              //if isset image owner
              $image_owner = $request->file('image_owner');
              if($request->hasFile('image_owner')){
              
                $month_bonus_track = new BonusTrackMedia;
                $month_bonus_track->id_category = $request->get('category_bonus_track');
                $month_bonus_track->month = $request->get('month_bonus_track');
                $month_bonus_track->image = $image_owner->getClientOriginalName();
                $month_bonus_track->save();
              
                Storage::disk('public')->put('bonus_track_media/'.$request->get('category_bonus_track').'/'.$request->get('month_bonus_track').'/'.$image_owner->getClientOriginalName(), file_get_contents($image_owner->getRealPath()));
              }
              
              return response()->json(['estado' => true]);
              // return response()->json(['preview' => $values]);
            } else {
              return response()->json(['estado' => false]);
            }
          }
        
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
              $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
              $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );
            return \Response::json($respuesta);
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('bonus_track_'.$timestamp, function($excel) {
 
            $excel->sheet('Resultados Bonus Track Usuarios', function($sheet) {
                
                $users = DB::table('users')->select('users.id as id_user', 'dni.id_region')
                        ->join('dni', 'dni.id_user', '=', 'users.id')
                        ->orderBy('users.id', 'asc')
                        ->get();

                
		foreach($users as &$user){
			$user->dni = Dni::getDni($user->id_user);
			$user->nombre_apellido = Dni::getName($user->id_user);
			$user->region = Regions::getName($user->id_region);
			$user->agencia = Agentes::getName(UsersProfile::getIdAgente($user->id_user));
			$user->puntos = "";
			$user->desempeno = "";
			$user->puesto = "";
		}

                $sheet->fromArray(json_decode( json_encode($users), true));
 
            });
            
        })->export('xls');
    }
    
    public function import($values)
    {
        $message;
        try {
          $data = json_decode($values);
          $status_message = true;
                
          if(!empty($data)){
            foreach($data as $value) {
                
              //insert new performance
              $insert = new UsersGanadores;
              $insert->id_user = $value->id_user;
              $insert->indicador_1 = 0;
              $insert->indicador_2 = 0;
              $insert->promedio = 0;
              $insert->total = 0;
              
              $insert->puntos = $value->puntos;
              $insert->asunto = $value->asunto;
              $insert->save();

              //actualizo DESEMPENO HISTORICO DEL USER
              $historical_performance = Dni::find(Dni::getIdUser($value->id_user));
              $historical_performance->puntos = ($historical_performance->puntos + $value->puntos);
              $historical_performance->historical_puntos = ($historical_performance->historical_puntos + $value->puntos);
              $historical_performance->save();
              
              
              $bonus_track = new BonusTrack;
              $bonus_track->id_category = $value->id_category;
              $bonus_track->month = $value->month;
              $bonus_track->id_user = $value->id_user;
              $bonus_track->id_region = $value->id_region;
              $bonus_track->puntos = $value->puntos;
              $bonus_track->desempeno = $value->desempeno;
              $bonus_track->puesto = $value->puesto;
              $bonus_track->save();
              
            }
          } else {
            $status_message = false;
          }
          return response()->json(['estado' => $status_message]);
        
        } catch(\Exception $e) {
            if(\Config::get('app.debug'))
              $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
              $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );
            return \Response::json($respuesta);
	}
    }
}