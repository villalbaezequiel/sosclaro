<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guest;
use App\GuestQuestions;
use App\GuestUsers;
use App\Dni;
use App\UsersProfile;
use Illuminate\Support\Facades\Auth;

class GuestsController extends Controller
{
    public function index() {
        
        $id_user = Auth::user()->id;
        $guests = Guest::where('active', '=', 1)->get()->toArray();
        $guests_complete = array();
        $guests_incomplete = array();
        
        foreach($guests as $guest){
            if(GuestUsers::getCheckGuest($id_user, $guest['id'])){
                $guests_complete[] = $guest; 
            } else {
                $guests_incomplete[] = $guest;
            }
        }            
        return view('frontend.guests.encuestas', [
            'guests_complete' => $guests_complete,
            'guests_incomplete' => $guests_incomplete,
            'id_user' => $id_user,
        ]);
    }
    
    public function show($id) {
        return view('frontend.guests.encuesta_single', [
            'guest' => Guest::where('id', '=', $id)->get()->toArray(),
            'guest_questions' => GuestQuestions::where('id_guest', '=', $id)->get()->toArray(),
            'user_profile' => UsersProfile::where('id_user', '=', Auth::user()->id)->get()->toArray()
        ]);
    }
    
    public function store(Request $request) {
        $message;
        try {
            
            $guest_user = new GuestUsers;
            $guest_user->id_guest = $request->get('id_guest');
            $guest_user->id_user = $request->get('user_id');
            $guest_user->results = json_encode($request->get('questions'));
            $guest_user->save();
            
            $dni_id = Dni::getIdUser($request->get('user_id'));
            
            //sumo los puntos
            $user_dni = Dni::find($dni_id);
            $user_dni->puntos = ($user_dni->puntos + $request->get('puntos_guest'));
            $user_dni->historical_puntos = ($user_dni->historical_puntos + $request->get('puntos_guest'));
            $user_dni->save();
            
            $message = $request->get('puntos_guest');
            return redirect('/encuestas')->with('message', $message);
        
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
