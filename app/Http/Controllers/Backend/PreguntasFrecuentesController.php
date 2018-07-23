<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Functions;
use App\PreguntasFrecuentes;

class PreguntasFrecuentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = PreguntasFrecuentes::all();
        
        return view('backend.preguntas-frecuentes.index', [
            'section'   => 'preguntas-frecuentes',
            'preguntas' => $preguntas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.preguntas-frecuentes.create', [
            'section' => 'preguntas-frecuentes'
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
        $rules = array(
            'pregunta'  => 'required',
            'respuesta' => 'required',
            'active'    => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            
            return redirect('/admin/preguntas-frecuentes/create')
                        ->with("message", "Hay campos incompletos!");
            
        } else {
            
            $pregun_frec = new PreguntasFrecuentes;
            $pregun_frec->pregunta  = $request->input('pregunta');
            $pregun_frec->respuesta  = $request->input('respuesta');
            $pregun_frec->active = $request->input('active');
            $pregun_frec->save();
            
            return redirect('/admin/preguntas-frecuentes')
                        ->with("message", "Nueva Pregunta Frecuente creada con exito!");
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
        $pregun_frec = PreguntasFrecuentes::find($id);
        
        return view('backend.preguntas-frecuentes.edit', [
            'section'       => 'preguntas-frecuentes',
            'pregun_frec'   => $pregun_frec
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
        $rules = array(
            'pregunta'  => 'required',
            'respuesta' => 'required',
            'active'    => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            
            return redirect('/admin/preguntas-frecuentes/'.$id.'/edit')
                        ->with("message", "Hay campos incompletos!");
            
        } else {
            
            $pregun_frec = PreguntasFrecuentes::find($id);
            $pregun_frec->pregunta  = $request->input('pregunta');
            $pregun_frec->respuesta  = $request->input('respuesta');
            $pregun_frec->active = $request->input('active');
            $pregun_frec->save();
            
            return redirect('/admin/preguntas-frecuentes')
                        ->with("message", "Pregunta Frecuente editada con exito!");
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
        $pregun_frec = PreguntasFrecuentes::find($id);
        $pregun_frec->delete();
        
        return redirect('/admin/preguntas-frecuentes')
                    ->with('message', "Pregunta Frecuente eliminada!");
    }
}