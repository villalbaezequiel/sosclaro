<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guest;
use App\GuestUsers;
use App\GuestQuestions;
use App\UsersProfile;
use App\Dni;

class GuestsApiController extends Controller
{
    
    public function allGuests($id_user)
    {
        $message;
        try{
            $guests = Guest::where('active', '=', 1)->get()->toArray();
            $encuestas_completas = array();
            $encuestas_incompletas = array();
            
            foreach($guests as $guest){
                if(GuestUsers::getCheckGuest($id_user, $guest['id'])){
                    $encuestas_completas[] = $guest;
                } else {
                    $encuestas_completas[] = $guest;
                }
            }
            
            return response()->json(['status' => 1, 'encuestas_completas' => $encuestas_completas, 'encuestas_incompletas' => $encuestas_incompletas]);
        
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
    
    public function showGuest($id_user ,$id_guest)
    {
        $message;
        try {
            
            return response()->json(['guest' => Guest::where('id', '=', $id_guest)->get()->toArray(),
                'guest_questions' => GuestQuestions::where('id_guest', '=', $id_guest)->get()->toArray()]);
            
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
    
    public function storeGuest($id_user, $id_guest, Request $request) {
        $message;
        try {
            
            $guest_user = new GuestUsers;
            $guest_user->id_guest = $id_guest;
            $guest_user->id_user = $id_user;
            $guest_user->results = json_encode($request->get('questions'));
            $guest_user->save();
            
            $dni_id = Dni::getIdUser($id_user);
            
            //sumo los puntos
            $user_dni = Dni::find($dni_id);
            $user_dni->puntos = ($user_dni->puntos + $request->get('puntos_guest'));
            $user_dni->save();
            
            $message = $request->get('puntos_guest');
            
            return response()->json(['status' => 1, 'message' => $message]);
        
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
