<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Dni;

class FixBugsController extends Controller
{

  public function createDuplicates()
  {
    return view('backend.dni.bugs_duplicate');
  }


    public function storeDuplicates(Request $request)
    {
       $message;
        try {
            if($request->hasFile('dni')){
                $path = $request->file('dni')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();
                $values = array();

                if(!empty($data) && $data->count()){
                  foreach ($data as $key => $value) {
                    if($value->id){

                      $dni = Dni::find($value->id);
                      $dni->name = $value->name;
                      $dni->last_name = $value->last_name;
                      $dni->save();
                    }
                  }

                  return redirect('/admin/dni_fix_duplicates/create')->with('message', 'Bugs arreglado con exito!');
                } else {
                  return redirect('/admin/dni_fix_duplicates/create')->with('message', 'Hubo un error! Verificar el csv a subir!');
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


}
