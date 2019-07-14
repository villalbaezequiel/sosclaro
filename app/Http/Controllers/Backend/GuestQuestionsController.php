<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Guest;
use App\GuestQuestions;

class GuestQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.guest_questions.index', [
            'guest_questions' => GuestQuestions::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.guest_questions.create', [
            'guests' => Guest::all()
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
            
            $guest_question = new GuestQuestions;
            $guest_question->id_guest = $request->get('id_guest');
            $guest_question->question = $request->get('guest_question');
            $guest_question->type_input = $request->get('type_input_question');
            
            if($request->get('type_input_question') == 1){
                $guest_question->options = '';
            } else {
                $guest_question->options = json_encode(explode(',' ,$request->get('options_guest_question')));
            }
            
            $guest_question->order = 0;
            $guest_question->active = $request->get('active_guest_question');
            $guest_question->save();

            $message = "Pregunta de Encuesta: ".$request->get('guest_question')." creada con exito!";
            
            return redirect('/admin/guests/questions')->with('message', $message);
        
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
        $question = GuestQuestions::find($id);
        if($question->type_input == 1){
            $options_string = FALSE;
        } else {
            $options_string = implode(',' ,json_decode($question->options));
        }
        
        $orders = GuestQuestions::where('id_guest', '=', $question->id_guest)->count();
        
        return view('backend.guest_questions.edit', [
            'question' => $question,
            'options' => json_decode($question->options),
            'options_string' => $options_string,
            'guests' => Guest::all(),
            'orders' => $orders 
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
            
            $guest_question = GuestQuestions::find($id);
            $guest_question->id_guest = $request->get('id_guest');
            $guest_question->question = $request->get('guest_question');
            $guest_question->type_input = $request->get('type_input_question');
            
            if($request->get('type_input_question') == 1){
                $guest_question->options = '';
            } else {
                $guest_question->options = json_encode(explode(',' ,$request->get('options_guest_question')));
            }
            
            $guest_question->order = $request->get('order_question');
            $guest_question->active = $request->get('active_guest_question');
            $guest_question->save();
     
            $message = "Pregunta de Encuesta: ".$request->get('guest_question')." editada con exito!";
            
            return redirect('/admin/guests/questions')->with('message', $message);
        
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
        $guest_question = GuestQuestions::find($id);
        $guest_question->delete();
        
        return redirect('/admin/guests/questions')->with('message', 'Pregunta de Encuesta eliminada con exito!');
    }
}
