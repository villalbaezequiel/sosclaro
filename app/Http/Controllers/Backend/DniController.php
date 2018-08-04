<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\UsersProfile;
use App\User;
use App\Dni;
use App\Agentes;
use App\Provinces;
use App\Cities;

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
                      if($value->dni && $value->id_region){
                          
                        $searchDni = Dni::where('dni', '=', $value->dni)->get();
                        
                        if(!$searchDni->count()){
                            
                            $insert = new Dni;
                            $insert->dni = $value->dni;       
                            $insert->name = $value->nombres;
                            $insert->last_name = $value->apellidos;
                            $insert->id_region = $value->id_region;
                            $insert->save();
                           
                            if(Dni::getIdDni($value->dni)){
                                
                                //insert agente
                                if(Agentes::checkAgente($value->agente) == FALSE){
                                    $agente = new Agentes;
                                    $agente->name = $value->agente;
                                    $agente->description = '';
                                    $agente->active = 1;
                                    $agente->save();
                                }
                                
                                //insert city
                                if(Cities::checkCitie($value->localidad) == FALSE){
                                    $citie = new Cities;
                                    $citie->id_province = 0;
                                    $citie->name = $value->localidad;
                                    $citie->active = 1;
                                    $citie->save();
                                }
                                
                                //insert province
                                if(Provinces::checkProvince($value->provincia) == FALSE){
                                    $prov = new Provinces;
                                    $prov->name = $value->provincia;
                                    $prov->save();
                                }
                                
                                $userProfile = new UsersProfile;
                                $userProfile->id_user = 0;
                                $userProfile->id_dni= Dni::getIdDni($value->dni);
                                $userProfile->id_agente = Agentes::getIdForName($value->agente);
                                $userProfile->id_province = Provinces::getIdForName($value->provincia);
                                $userProfile->id_city = Cities::getIdForName($value->localidad);
                                $userProfile->type_user = $value->tipo_usuario; // tipo de usuario
                                $userProfile->admission_date = $value->fecha_ingreso->toDateTimeString(); // fecha ingreso
                                $userProfile->address = $value->direccion;
                                $userProfile->cp = $value->cp;
                                $userProfile->save();
                            }
                        } 
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

            //return \Response::json($respuesta);
            
            $message = "Error al importar DNI. Asegurese que este subiendo el archivo correcto."
                    . " Con los datos correspondientes. Tenga en cuenta la PLANTILLA EXCEL. Todos los campos tienen que estar completos.";
            return redirect('/admin/dni')->with('message', $message);
	} 
    }
    
    public function show($id){
        return view('backend.dni.show', [
            'dni' => Dni::find($id)
        ]);
    }
}
