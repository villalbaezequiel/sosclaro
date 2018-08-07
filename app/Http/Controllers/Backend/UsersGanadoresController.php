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
use Illuminate\Support\Facades\DB;

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
        return view('backend.desempeno.create');
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
                $values = array();
                
                if(!empty($data) && $data->count()){
                    
                  foreach ($data as $key => $value) {
                    if(!empty($value->indicador_1) && !empty($value->indicador_2)){
                      $values[] = 
                            array('id' => $value->id,
                                  'id_region' => $value->id_region,
                                  'dni' => $value->dni,
                                  'nombre_apellido' => $value->nombre_apellido,
                                  'puntos' => $value->puntos,
                                  'indicador_1' => $value->indicador_1,
                                  'indicador_2' => $value->indicador_2,
                                  'total' => $value->total,
                                  'asunto' => $request->get('desempeno_asunto'));
                    }
                  }
                  //view preview
                  return view('backend.desempeno.create', ['preview' => $values]);
                  
                } else {
                  $message = "Error al Importar Desempeño. Asegurese que este subiendo el archivo correcto."
                    . " Con los datos correspondientes. Tenga en cuenta 'Descargar Excel a completar'. Todos los campos tienen que estar completos.";
                  return redirect('/admin/desempeno/create')->with('message', $message);
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

            $message = "Error Técnico. Comuníquese con Soporte Técnico.";
            return redirect('/admin/desempeno')->with('message', $message);
            
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
        Excel::create('desempeno_users_'.$timestamp, function($excel) {
 
            $excel->sheet('Desempeno Usuarios', function($sheet) {
                
                $users = DB::table('users')->select('users.id', 'dni.id_region')
                        ->join('dni', 'dni.id_user', '=', 'users.id')
                        ->where('users.active', '=', 1)
                        ->orderBy('users.id', 'asc')
                        ->get();

                
		foreach($users as &$user){
			$user->dni = Dni::getDni($user->id);
			$user->nombre_apellido = Dni::getName($user->id);
			$user->puntos = "";
			$user->indicador_1 = "";
			$user->indicador_2 = "";
			$user->total = "";
		}

                $sheet->fromArray(json_decode( json_encode($users), true));
 
            });
            
        })->export('xls');
    }
    
    public function import($values)
    {
        $message;
        try {
            $data = unserialize($values);
            $status_message = true;
                
            if(!empty($data)){
                foreach ($data as $value) {

                    //convert array to object
                    $value = (object)$value;
                
                    //calculate average
                    $promedio = (($value->indicador_1 + $value->indicador_2) / 2);

                    //insert new performance
                    $insert = new UsersGanadores;
                    $insert->id_user = $value->id;
                    $insert->indicador_1 = $value->indicador_1;
                    $insert->indicador_2 = $value->indicador_2;

                    // if !empty puntos
                    if(isset($value->puntos) && !empty($value->puntos)){
                        $insert->puntos = $value->puntos;
                    } else {
                        $insert->puntos = 0;
                    }

                    $insert->promedio = $promedio;
                    $insert->total = $value->total;
                    $insert->asunto = $value->asunto;
                    $insert->save();

                    //actualizo DESEMPENO HISTORICO DEL USER
                    $historical_performance = Dni::find(Dni::getIdUser($value->id));
                    $historical_performance->puntos = ($historical_performance->puntos + $value->puntos);
                    $historical_performance->historical_puntos = ($historical_performance->historical_puntos + $value->puntos);
                    $historical_performance->historical_performance = ($historical_performance->historical_performance + $promedio);
                    $historical_performance->save();
                }
            } else {
                $status_message = false;
            }
                    
            if($status_message == true){
                $message = "Excel de Desempeño importado con exito!";
            } else {
                $message = "Error al importar Desempeño. Asegurese que este subiendo el archivo correcto."
                . " Con los datos correspondientes. Tenga en cuenta 'Descargar Excel a completar'. Todos los campos tienen que estar completos.";
            }
                    
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

            //return \Response::json($respuesta);
            
            $message = "Error Técnico. Comuníquese con Soporte Técnico.";
            return redirect('/admin/desempeno')->with('message', $message);
            
	}
    }
}
