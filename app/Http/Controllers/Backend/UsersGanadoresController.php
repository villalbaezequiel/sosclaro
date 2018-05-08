<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Regions;
use App\UsersGanadores;
use App\UsersProfile;
use App\Dni;
use App\Indicadores;

class UsersGanadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.desempeno.index', [
            'desempenos' => UsersGanadores::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.desempeno.create', [
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
                
            if($request->hasFile('file_desempeno')){
                $path = $request->file('file_desempeno')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                if(!empty($data) && $data->count()){
                    
                    foreach ($data as $key => $value) {
                            
                        $insert = new UsersGanadores;
                        $insert->dni = $value->dni;
                        $insert->name_lastname = $value->nombre_apellido;
                        $insert->id_region = $value->id_region;
                        $insert->puntos = $value->puntos;
                        $insert->indicador_1 = $value->indicador_1;
                        $insert->indicador_2 = $value->indicador_2;
                        $insert->promedio = (($value->indicador_1 + $value->indicador_2) / 2);
                        $insert->especification = 'cata';
                        $insert->save();
                        
                        //cargo los indicadores
                        $indicador_1 = new Indicadores;
                        $indicador_1->name = $value->indicador_1;
                        $indicador_1->active = 1;
                        $indicador_1->save();
                        
                        $indicador_2 = new Indicadores;
                        $indicador_2->name = $value->indicador_2;
                        $indicador_2->active = 1;
                        $indicador_2->save();

                        //sumo los puntos al usuario
                        $user_dni = Dni::find(Dni::getIdDni($value->dni));
                        $user_dni->puntos = ($user_dni->puntos + $value->puntos);
                        $user_dni->indicador = json_encode(array($indicador_1->id, $indicador_2->id));
                        $user_dni->save();
                        
                        //sumo los puntos historicos
                        //UsersProfile::setPuntosHistory($user_dni->id_user, $value->puntos);                        
                        
                    }
                    
                }
            }
            
            $message = "Excel de Desempeño importado con exito!";
            
            return redirect('/admin/desempeno')->with('message', $message);
        
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
