<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Guest;
use App\GuestQuestions;
use Illuminate\Support\Facades\DB;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('backend.guests.index', [
            'guests' => $guests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.guests.create');
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
     
            $guest = new Guest;
            $guest->name = $request->get('name_guest');
            $guest->description = $request->get('description_guest');
            $guest->puntos = $request->get('puntos_guest');
            $guest->active = $request->get('active_guest');
            $guest->save();
     
            $message = "Encuesta: ".$request->get('name_guest')." creada con exito!";
            
            return redirect('/admin/guests')->with('message', $message);
        
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
        return view('backend.guests.edit', [
            'guest' => Guest::find($id)
        ]);
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
        $message;
        try {
            
            $guest = Guest::find($id);
            $guest->name = $request->get('name_guest');
            $guest->description = $request->get('description_guest');
            $guest->puntos = $request->get('puntos_guest');
            $guest->active = $request->get('active_guest');
            $guest->save();
     
            $message = "Encuesta: ".$request->get('name_guest')." editada con exito!";
            
            return redirect('/admin/guests')->with('message', $message);
        
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elimina todas las entradas relacionada a la Encuesta $id
        $guestQuestions = GuestQuestions::where('id_guest', $id)->get();         
        foreach ($guestQuestions as $value) {
            $guestQ = GuestQuestions::find($value->id);
            $guestQ->delete();
        }
        
        $guest = Guest::find($id);
        $guest->delete();
     
        return redirect('/admin/guests')->with('message', 'Encuesta eliminada con exito!');
    }
}