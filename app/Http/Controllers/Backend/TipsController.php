<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\Tips;
use App\TipsCategories;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tips.index', [
            'tips' => Tips::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tips.create', [
            'tips_categories' => TipsCategories::all()
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
            $imagen_tip = $request->file('imagen_tip');
            
            $tip = new Tips;
            $tip->id_category = $request->get('id_category');
            $tip->title = $request->get('title_tip');
            $tip->description = $request->get('description_tip');
            $tip->url_youtube = $request->get('url_youtube_tip');
            $tip->image = $imagen_tip->getClientOriginalName();
            $tip->active = $request->get('active_tip');
            $tip->save();
                 
            if($request->hasFile('imagen_tip')){
                Storage::disk('public')->put('tips/'.$tip->id.'/'.$imagen_tip->getClientOriginalName(), file_get_contents($imagen_tip->getRealPath()));
            }
            
            $message = "Consejo: ".$request->get('title_tip')." creado con exito!";
            
            return redirect('/admin/tips')->with('message', $message);
        
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
        return view('backend.tips.edit', [
            'tip' => Tips::find($id),
            'tips_categories' => TipsCategories::all()
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
            $imagen_tip = $request->file('imagen_tip');
            
            $name_imagen = "";
            
            if(isset($imagen_tip) && !empty($imagen_tip)){
                
                Storage::deleteDirectory('public/tips/'.$tip->id);
                if($request->hasFile('imagen_tip')){
                    Storage::disk('public')->put('tips/'.$tip->id.'/'.$imagen_tip->getClientOriginalName(), file_get_contents($imagen_tip->getRealPath()));
                    $name_imagen =  $imagen_tip->getClientOriginalName();
                }
            
            } else {
                $name_imagen = $request->get('imagen_tip_old');
            } 
                
            $tip = Tips::find($id);
            $tip->id_category = $request->get('id_category');
            $tip->title = $request->get('title_tip');
            $tip->description = $request->get('description_tip');
            $tip->url_youtube = $request->get('url_youtube_tip');
            $tip->image = $name_imagen;
            $tip->active = $request->get('active_tip');
            $tip->save();
     
            $message = "Consejo: ".$request->get('title_tip')." editado con exito!";
            
            return redirect('/admin/tips')->with('message', $message);
        
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
        $tip = Tips::find($id);
        $tip->delete();
     
        Storage::deleteDirectory('public/tips/'.$id);
        
        return redirect('/admin/tips')->with('message', 'Consejo eliminado con exito!');
    }
}

