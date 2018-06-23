<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Regions;
use App\UsersProfile;
use App\Dni;

class ResultadosApiController extends Controller
{
    public function index($id_user)
    {
    
        $message;
        try {
            
            $posicionNacional= DB::table('dni')
                        ->select('id', 'id_user', 'historical_performance')
                        ->where('id_user', '!=', 0)
                        ->where('historical_performance', '!=', 0)
                        ->orderBy('historical_performance', 'desc')
                        ->get();
        
            $historical_performance = "";

            foreach($posicionNacional as $key => $value){
                if($value->id_user == $id_user){
                    $historical_performance = ($key+1);
                }
            }

            $id_region = Dni::getRegion($id_user);

            $posicionRegion = DB::table('dni')
                            ->select('id', 'id_region', 'id_user', 'historical_puntos')
                            ->where('id_region', '=', $id_region)
                            ->where('id_user', '!=', 0)
                            ->where('historical_puntos', '!=', 0)
                            ->orderBy('historical_puntos', 'desc')
                            ->get();

            $historical_region = "";

            foreach($posicionRegion as $key => $value){
                if($value->id_user == $id_user){
                    $historical_region = ($key+1);
                }
            }

            return response()->json(['status' => 1, 
                'regions' => Regions::all(),
                'historical_region' => $historical_region,
                'region_name' => Regions::getName($id_region),
                'historical_performance' => $historical_performance], 200, [], JSON_UNESCAPED_UNICODE);

        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
        
    }
    
    public function ajax($id_region, $id_user = null)
    {
        $message;
        try {
            
            $users = array();
        
            if($id_region == 69696){
                $id_region_auth_user = Dni::getRegion($id_user);
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

        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
        
    }
    
}
