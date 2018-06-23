<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipsCategories;
use App\Tips;

class TipsApiController extends Controller
{
    
    public function allTips(){
        
        $message;
        try {
            $tips_categories = TipsCategories::where('active', '=', 1)->get()->toArray();
            $tips = Tips::where('active', '=', 1)->get()->toArray();
            
            return response()->json(['status' => 1, 'tips_categories' => $tips_categories, 'tips' => $tips], 200, [], JSON_UNESCAPED_UNICODE);

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
    
    public function showTips($id_tips) {
        $message;
        try {
            $tip = Tips::find($id_tips)->toArray();
            
            return response()->json(['status' => 1, 'tip_categoria_name' => TipsCategories::getNameCategory($tip['id_category']), 'tip' => $tip], 200, [], JSON_UNESCAPED_UNICODE);

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
