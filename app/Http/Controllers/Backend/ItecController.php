<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\User;
use App\Itec;

class ItecController extends Controller
{
    public function index() {
        return view('backend.itec.index', [
            'itecs' => Itec::all()
        ]);
    }
    
    public function create(){
        return view('backend.itec.create');
    }
    
    public function store(Request $request){
       $message;
        try {
     
            //Manipular EXCEL e insertarlo en la DB
            
            $message = "Excel de ITEC: ".$request->get('name_guest')." importado con exito!";
            
            return redirect('/admin/itec')->with('message', $message);
        
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
