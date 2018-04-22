<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Indicadores;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.indicadores.index', [
            'indicadores' => Indicadores::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.indicadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indicador = new Indicadores;
        $indicador->name = $request->get('name_indicador');
        $indicador->active = $request->get('active_indicador');
        $indicador->save();
        
        return redirect('/admin/indicadores')->with('message', "Indicador: ".$request->get('name_indicador')." creado con exito!");
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
        return view('backend.indicadores.edit', [
            'indicador' => Indicadores::find($id)
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
        $indicador = Indicadores::find($id);
        $indicador->name = $request->get('name_indicador');
        $indicador->active = $request->get('active_indicador');
        $indicador->save();
        
        return redirect('/admin/indicadores')->with('message', "Indicador: ".$request->get('name_indicador')." editada con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicador = Indicadores::find($id);
        $indicador->delete();
        
        return redirect('/admin/indicadores')->with('message', 'Indicador eliminado con exito!');
    }

}
