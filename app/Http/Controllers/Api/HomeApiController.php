<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modals;

class HomeApiController extends Controller
{
    
    public function index(){
        
        $message;
        try {
            
            $modals = Modals::where('active', '=', 1)->get();
            
            foreach($modals as &$modal){
                $modal->image_desktop = asset('storage/app/public/modals/desktop/'.$modal->id.'/'.$modal->image_desktop);
                $modal->image_mobile = asset('storage/app/public/modals/mobile/'.$modal->id.'/'.$modal->image_mobile);    
                
            }

            return response()->json(['status' => 0, 'modals' => $modals]);

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
