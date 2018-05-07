<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regions;
use App\UsersGanadores;

class UsersGanadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.users_ganadores.create', [
            'regions' => Regions::all(),
            'meses' => array('Mayo')
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
                
            if($request->hasFile('xls_user_g')){
                $path = $request->file('xls_user_g')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                if(!empty($data) && $data->count()){
                    
                    foreach ($data as $key => $value) {
                            
                        $insert = new UsersGanadores;
                        $insert->id_region = $request->get('id_region_user_g');
                        $insert->mes = $request->get('id_region_user_g');
                        $insert->puesto = $value->puesto;
                        $insert->nombre = $value->nombre;
                        $insert->puntos = $value->puntos;
                        $insert->save();
                        
                    }
                    
                }
            }
            
            $message = "Excel de Usuarios Ganadores: importado con exito!";
            
            return redirect('/admin/users_ganadores')->with('message', $message);
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
