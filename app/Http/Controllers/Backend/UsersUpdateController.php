<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Dni;
use App\UsersProfile;
use App\Agentes;
use App\Cities;
use App\Provinces;

class UsersUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect('/admin/users_update/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.users_update.create');
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
            if($request->hasFile('import_dni')){
                $path = $request->file('import_dni')->getRealPath();
                $data = Excel::load($path, function($reader){})->get();
                
                if(!empty($data) && $data->count()){
                  foreach ($data as $key => $value) {
                    if(!empty($value->dni)){
                        
                       // id DNI user
                      $idDni = Dni::where('dni', '=', $value->dni)->get()->toArray();
                      if(!empty($idDni)){
                          
                        $dni = Dni::find($idDni[0]['id']);
                        // update name
                        if($value->nombres && !empty($value->nombres)){
                            $dni->name = $value->nombres;
                        }
                        // update last_name
                        if($value->apellidos && !empty($value->apellidos)){
                            $dni->last_name = $value->apellidos;
                        }
                        // update puntos and historical_puntos
                        if($value->puntos && !empty($value->puntos)){
                            $dni->puntos = ($dni->puntos + $value->puntos);
                            $dni->historical_puntos = ($dni->historical_puntos + $value->puntos);
                        }
                        // save update
                        $dni->save();
                                
                        // verifico si existe el agente. Sino lo inserto
                        if($value->agente && !empty($value->agente)){
                          if(Agentes::checkAgente($value->agente) == FALSE){
                            $agente = new Agentes;
                            $agente->name = $value->agente;
                            $agente->description = '';
                            $agente->active = 1;
                            $agente->save();
                          }
                        }
                        
                        //insert city
                        if($value->localidad && !empty($value->localidad)){
                          if(Cities::checkCitie($value->localidad) == FALSE){
                            $citie = new Cities;
                            $citie->id_province = 0;
                            $citie->name = $value->localidad;
                            $citie->active = 1;
                            $citie->save();
                          }
                        }
                        
                        //insert province
                        if($value->provincia && !empty($value->provincia)){
                          if(Provinces::checkProvince($value->provincia) == FALSE){
                            $prov = new Provinces;
                            $prov->name = $value->provincia;
                            $prov->save();
                          }
                        }
                        
                        // id USERSPROFILE user
                        $idUsersProfile = UsersProfile::where('id_user', '=', $value->id)->get()->toArray();
                        
                        if(!empty($idUsersProfile)){
                            $userProfile = UsersProfile::find($idUsersProfile[0]['id']);

                            // update agente
                            if($value->agente && !empty($value->agente)){
                                $userProfile->id_agente = Agentes::getIdForName($value->agente);    
                            }

                            // update address
                            if($value->direccion && !empty($value->direccion)){
                                $userProfile->address = $value->direccion;    
                            }

                            // update cp
                            if($value->cp && !empty($value->cp)){
                                $userProfile->cp = $value->cp;    
                            }

                            // update city
                            if($value->localidad && !empty($value->localidad)){
                                $userProfile->id_city = Cities::getIdForName($value->localidad);
                            }

                            // update province
                            if($value->provincia && !empty($value->provincia)){
                                $userProfile->id_province = Provinces::getIdForName($value->provincia);
                            }

                            // udpdate admission_date
                            if($value->fecha_ingreso && !empty($value->fecha_ingreso)){
                                $userProfile->admission_date = $value->fecha_ingreso;    
                            }

                            // update type_user
                            if($value->tipo_usuario && !empty($value->tipo_usuario)){
                                $userProfile->type_user = $value->tipo_usuario;
                            }

                            $userProfile->save();
                        }
                      }  
                    }
                  }
                  
                  die();
                  
                  return redirect('/admin/users')->with('message', '¡Usuarios Registrados actualizados con exito!');
                  
                } else {
                  return redirect('/admin/users_update/create')->with('message', 'Hubo un error al Actualizar los Usuarios. Por favor, revise que este subiendo el archivo correcto');
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
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('export_users_'.$timestamp, function($excel) {
 
            $excel->sheet('Usuarios registrados', function($sheet) {
                
                $users = DB::table('users')->select('users.id', 
                                                    'users_profile.id_user',
                                                    'users_profile.id_region',
                        
                                                    'users.id as dni',
                                                    'users.id as nombres',
                                                    'users.id as apellidos',
                                                    
                                                    'users_profile.id_agente as agente',
                                                    'users_profile.address as direccion',
                                                    'users_profile.cp',
                                                    'users_profile.id_city as localidad',
                                                    'users_profile.id_province as provincia',
                                                    'users_profile.admission_date as fecha_ingreso',
                                                    'users_profile.type_user as tipo_usuario')
                        ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                        ->get();

		foreach($users as &$user){
                    $user->dni = Dni::getDni($user->dni);
                    $user->nombres = Dni::getName($user->nombres);
                    $user->apellidos = Dni::getName($user->apellidos);
                    $user->agente = Agentes::getName($user->agente);
                    $user->localidad = Cities::getName($user->localidad);
                    $user->provincia = Provinces::getName($user->provincia);
                    $user->puntos = '';
                    
                    unset($user->id); // users ID
                    unset($user->id_user); // users_profile ID_USER
		}

                $sheet->fromArray(json_decode( json_encode($users), true));
 
            });
            
        })->export('xls');
    }
}
