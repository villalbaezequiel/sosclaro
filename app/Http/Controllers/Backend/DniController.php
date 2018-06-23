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

                        $searchDni = Dni::where('dni', '=', $value->dni)->get();
                        
                        if(!$searchDni->count()){

                            $insert = new Dni;
                            $insert->dni = $value->dni;       
                            $insert->id_user = 0;
                            $insert->id_region = $value->id_region;
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
