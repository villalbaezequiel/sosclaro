<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\TipsCategories;

class TipsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tips_categories.index', [
            'tips_categories' => TipsCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tips_categories.create');
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
            
            $tip_tip_category = new TipsCategories;
            $tip_tip_category->name = $request->get('name_tip_category');
            $tip_tip_category->active = $request->get('active_tip_category');
            $tip_tip_category->save();
     
            $message = "Categoria de Consejo: ".$request->get('name_tip_category')." creada con exito!";
            
            return redirect('/admin/tips/categories')->with('message', $message);
        
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
        return view('backend.tips_categories.edit', [
            'tip_category' => TipsCategories::find($id)
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
            
            $tip_tip_category = TipsCategories::find($id);
            $tip_tip_category->name = $request->get('name_tip_category');
            $tip_tip_category->active = $request->get('active_tip_category');
            $tip_tip_category->save();
     
            $message = "Categoria de Consejo: ".$request->get('name_tip_category')." editada con exito!";
            
            return redirect('/admin/tips/categories')->with('message', $message);
        
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
        $tip_tip_category = TipsCategories::find($id);
        $tip_tip_category->delete();
     
        return redirect('/admin/tips/categories')->with('message', 'Categoría de Consejo eliminada con exito!');
    }
}
