<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\User;
use App\Dni;

class DniController extends Controller
{
    public function index() {
        return view('backend.dni.index', [
            'dnis' => Dni::all()
        ]);
    }
    
    public function create(){
        return view('backend.dni.create');
    }
    
    public function store(Request $request){
       $message;
        try {
                
            if($request->hasFile('import_dni')){
                $path = $request->file('import_dni')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                if(!empty($data) && $data->count()){
                    
                    foreach ($data as $key => $value) {

                        $indicadores = array();
                        if(isset($value->indicador_1) && !empty($value->indicador_1)){ $indicadores[] = $value->indicador_1; }
                        if(isset($value->indicador_2) && !empty($value->indicador_2)){ $indicadores[] = $value->indicador_2; }
                        if(isset($value->indicador_3) && !empty($value->indicador_3)){ $indicadores[] = $value->indicador_3; }
                        
                        $searchDni = Dni::where('dni', '=', $value->dni)->get();
                        
                        if(!$searchDni->count()){

                            $insert = new Dni;
                            $insert->dni = $value->dni;
                            
                            if(isset($value->nombre) && !empty($value->nombre)){
                                $insert->name = $value->nombre;
                            } else {
                                $insert->name = '';
                            }
                            
                            if(isset($value->apellido) && !empty($value->apellido)){
                                $insert->last_name = $value->apellido;
                            } else {
                                $insert->last_name = '';
                            }
                            
                            if(isset($value->puntos) && !empty($value->puntos)){
                                $insert->puntos = $value->puntos;
                            } else {
                                $insert->puntos = 0;
                            }
                            if(isset($value->indicador_1) && !empty($value->indicador_1)){
                                $insert->indicador = json_encode($indicadores);
                            } else {
                                $indicadores[] = 1;
                                $insert->indicador = json_encode($indicadores);
                            }
                            
                            $insert->id_user = 0;
                            $insert->save();
                            
                        } else {
                            
                            $dniUpdate = $searchDni[0];
                                                        
                            $insert = Dni::find($dniUpdate->id);
                            $insert->dni = $value->dni;
                            
                            if(isset($value->nombre) && !empty($value->nombre)){
                                $insert->name = $value->nombre;
                            }
                            
                            if(isset($value->apellido) && !empty($value->apellido)){
                                $insert->last_name = $value->apellido;
                            }
                            
                            if(isset($value->puntos) && !empty($value->puntos)){
                                $insert->puntos = ($dniUpdate->puntos + $value->puntos);
                            } 
                            
                            if(isset($value->indicador_1) && !empty($value->indicador_1)){
                                $insert->indicador = json_encode($indicadores);
                            }
                            
                            $insert->save();
                            
                        }
                        
                    }
                    
                } else {
                    
                }
            }
     
            //Manipular EXCEL e insertarlo en la DB
            
            $message = "Excel de DNI: ".$request->get('name_guest')." importado con exito!";
            
            return redirect('/admin/dni')->with('message', $message);
        
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
    
    public function show($id){
        return view('backend.dni.show', [
            'dni' => Dni::find($id)
        ]);
    }
}
