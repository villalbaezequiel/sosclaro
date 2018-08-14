<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\ResultsCategories;
use App\Results;
use App\Dni;
use App\Regions;
use App\Agentes;
use App\UsersProfile;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.results.index', [
            'results' => Results::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.results.create', [
            'months' => Functions::getMonths(),
            'categories_results' => ResultsCategories::all()
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
          if($request->hasFile('file_results')){
            $path = $request->file('file_results')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

              foreach ($data as $key => $value) {
                if(!empty($value->id_region)
                        && !empty($value->puntos)
                        && !empty($value->desempeno) 
                        && !empty($value->puesto)
                        && !empty($request->get('category_results'))
                        && !empty($request->get('month_results')) ){
                  
                    $results = new Results;
                    $results->id_category = $request->get('category_results');
                    $results->month = $request->get('month_results');
                    $results->id_user = $value->id_user;
                    $results->id_region = $value->id_region;
                    $results->puntos = $value->puntos;
                    $results->desempeno = $value->desempeno;
                    $results->puesto = $value->puesto;
                    $results->save();
                }
              }
              return response()->json(['estado' => true]);

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
        Excel::create('results_'.$timestamp, function($excel) {
 
            $excel->sheet('Resultados Usuarios', function($sheet) {
                
                $users = DB::table('users')->select('users.id as id_user', 'dni.id_region')
                        ->join('dni', 'dni.id_user', '=', 'users.id')
                        ->orderBy('users.id', 'asc')
                        ->get();

                
		foreach($users as &$user){
			$user->dni = Dni::getDni($user->id_user);
			$user->nombre_apellido = Dni::getName($user->id_user);
			$user->region = Regions::getName($user->id_region);
			$user->agencia = Agentes::getName(UsersProfile::getIdAgente($user->id_user));
			$user->puntos = "";
			$user->desempeno = "";
			$user->puesto = "";
		}

                $sheet->fromArray(json_decode( json_encode($users), true));
 
            });
            
        })->export('xls');
    }
}