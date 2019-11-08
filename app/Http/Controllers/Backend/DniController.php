<?php

namespace App\Http\Controllers\Backend;

use App\UsersAllowed;
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
    
    public function store(Request $request)
    {
       $message;
        try {
            if($request->hasFile('import_dni')){
                $path = $request->file('import_dni')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();
                $values = array();
                
                if(!empty($data) && $data->count()){
                  foreach ($data as $key => $value) {
                    if($value->dni){
                          
                      $values[] = 
                        array('id_region' => (empty($value->id_region) ? 0 : $value->id_region),
                          'dni' => $value->dni,
                          'nombres' => $value->nombres,
                          'apellidos' => $value->apellidos,
                          'agente' => $value->agente,
                          'direccion' => $value->direccion,
                          'cp' => $value->cp,
                          'localidad' => $value->localidad,
                          'provincia' => $value->provincia,
                          'fecha_ingreso' => $value->fecha_ingreso->toDateTimeString(),
                          'tipo_usuario' => $value->tipo_usuario);
                    }
                  }
            
                // excepcion de carga de DNI por problema de request por GET
                  $dniList = $values;      
                  
                  if(!empty($dniList)){
                    foreach ($dniList as $val) {

                      $value = (object) $val;

                      $searchDni = UsersAllowed::where('dni', '=', $value->dni)->get();
                      if(!$searchDni->count()){

                        $insert = new UsersAllowed();
                        $insert->dni = $value->dni;       
                        $insert->name = $value->nombres;
                        $insert->last_name = $value->apellidos;
                        $insert->id_region = $value->id_region;

                        if (!empty($value->agente)) {
                            $agency_id = Agentes::getIdForName($value->agente);
                            $insert->id_agency = $agency_id;
                        }

                        if (!empty($value->localidad)) {
                          $insert->city = $value->localidad;
                        }

                        if (!empty($value->provincia)) {
                          $insert->id_province = Provinces::getIdForName($value->provincia);
                        }

                        $insert->type_user = strtoupper($value->tipo_usuario); // tipo de usuario
                        $insert->admission_date = $value->fecha_ingreso; // fecha ingreso
                        $insert->address = $value->direccion;
                        $insert->postal_code = $value->cp;

                        $insert->save();

                      }
                    }
                  }  
                  
                return response()->json(['estado' => true]);
                // return response()->json(['preview' => $values]);
                } else {
                  return response()->json(['estado' => false]);
                }
            }
     
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
    
    public function import($values)
    {
        $message;
        try {
            $data = json_decode($values);
            $status_message = true;
            
            if(!empty($data)){
                foreach ($data as $value) {

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
                        if(Agentes::checkAgente($value->agente) == FALSE && !empty($value->agente)){
                            $agente = new Agentes;
                            $agente->name = $value->agente;
                            $agente->description = '';
                            $agente->active = 1;
                            $agente->save();
                        }

                        //insert city
                        if(Cities::checkCitie($value->localidad) == FALSE && !empty($value->localidad)){
                            $citie = new Cities;
                            $citie->id_province = 0;
                            $citie->name = $value->localidad;
                            $citie->active = 1;
                            $citie->save();
                        }

                        //insert province
                        if(Provinces::checkProvince($value->provincia) == FALSE && !empty($value->provincia)){
                            $prov = new Provinces;
                            $prov->name = $value->provincia;
                            $prov->save();
                        }

                        $ID_UsersProfile = UsersProfile::getIdForIdDni(Dni::getIdDni($value->dni));

                        $userProfile = ($ID_UsersProfile ? UsersProfile::find($ID_UsersProfile) : new UsersProfile);
                        $userProfile->id_user = 0;
                        $userProfile->id_dni= Dni::getIdDni($value->dni);
                        $userProfile->id_agente = (empty($value->agente) ? 0 : Agentes::getIdForName($value->agente));
                        $userProfile->id_province = (empty($value->provincia) ? 0 : Provinces::getIdForName($value->provincia));
                        $userProfile->id_city = (empty($value->localidad) ? 0 : Cities::getIdForName($value->localidad));
                        $userProfile->type_user = $value->tipo_usuario; // tipo de usuario
                        $userProfile->admission_date = $value->fecha_ingreso; // fecha ingreso
                        $userProfile->address = $value->direccion;
                        $userProfile->cp = $value->cp;
                        $userProfile->save();
                      }
                  }
                }
            } else {
              $status_message = false;
            }
            return response()->json(['estado' => $status_message]);
        
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
}
