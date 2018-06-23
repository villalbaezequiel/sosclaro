<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Regions;
use App\UsersGanadores;
use App\Dni;
use App\Functions;
use App\DesempenoName;

class DesempenoApiController extends Controller
{
    
    public function index()
    {
        $message;
        try {
            $allDesempeno= DB::table('desempeno')
                                    ->where('id_user', '=', Auth::user()->id)
                                    ->orderBy('id', 'DESC')
                                    ->get();

            $ultimoDesempeno = DB::table('desempeno')
                                    ->where('id_user', '=', Auth::user()->id)
                                    ->orderBy('id', 'DESC')
                                    ->limit(1)
                                    ->get();
            
            return response()->json(['status' => 1, 'all_desempeno' => $allDesempeno, 'ultimo_desempeno' => $ultimoDesempeno], 200, [], JSON_UNESCAPED_UNICODE);
            
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
