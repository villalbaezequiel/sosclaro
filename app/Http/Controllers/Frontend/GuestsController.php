<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guest;
use App\GuestQuestions;
use App\GuestUsers;
use App\Dni;
use Illuminate\Support\Facades\Auth;

class GuestsController extends Controller
{
    public function index() {
        return view('frontend.guests.encuestas', [
            'guests' => Guest::where('active', '=', 1)->get()->toArray(),
            'id_user' => Auth::user()->id,
        ]);
    }
    
    public function show($id) {
        return view('frontend.guests.encuesta_single', [
            'guest' => Guest::where('id', '=', $id)->get()->toArray(),
            'guest_questions' => GuestQuestions::where('id_guest', '=', $id)->get()->toArray(),
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
