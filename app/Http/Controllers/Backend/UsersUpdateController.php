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
                        $idDni = Dni::where('dni', '=', $value->dni)->get();
                        
                        // update puntos
                        $dni = Dni::find($idDni[0]->id);
                        $dni->puntos = ($dni->puntos + $value->puntos);;
                        $dni->historical_puntos = ($dni->historical_puntos + $value->puntos);
                        $dni->save();
                                
                        // verifico si existe el agente. Sino lo inserto
                        if(Agentes::checkAgente($value->agente) == FALSE){
                            $agente = new Agentes;
                            $agente->name = $value->agente;
                            $agente->description = '';
                            $agente->active = 1;
                            $agente->save();
                        }
                        
                        // id USERSPROFILE user
                        $idUsersProfile = UsersProfile::where('id_user', '=', $value->id)->get();
                        
                        $userProfile = UsersProfile::find($idUsersProfile[0]->id);
                        
                        // update agente user
                        if($value->agente && !empty($value->agente)){
                            $userProfile->id_agente = Agentes::getIdForName($value->agente);    
                        }
                        
                        // udpdate fecha_ingreso user
                        if($value->fecha_ingreso && !empty($value->fecha_ingreso)){
                            $userProfile->admission_date = $value->fecha_ingreso;    
                        }
                        
                        // update tipo usuario user
                        if($value->tipo_usuario && !empty($value->tipo_usuario)){
                            $userProfile->type_user = $value->tipo_usuario;
                        }
                        
                        $userProfile->save();
                    }  
                  }
                  
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
                
                $users = DB::table('users')->select('users.id', 'users.email', 'users_profile.id_agente as agente')
                        ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                        ->get();

		foreach($users as &$user){
                    $user->dni = Dni::getDni($user->id);
                    $user->nombre_completo = Dni::getName($user->id);
                    $user->agente = Agentes::getName($user->agente);
                    $user->puntos = 0;
                    $user->fecha_ingreso = '';
                    $user->tipo_usuario = '';
		}

                $sheet->fromArray(json_decode( json_encode($users), true));
 
            });
            
        })->export('xls');
    }
}
