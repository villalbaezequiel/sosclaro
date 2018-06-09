<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\Exchanges;
use App\Dni;

class CatalogueApiController extends Controller
{
    
    public function index()
    {
        $message;
        try {
            
            return response()->json(['status' => 1, 'products' => Products::where('active', '=', 1)->get()]);
            
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
    }
    
    public function productShow($id)
    {
        $message;
        try {
            
            return response()->json(['status' => 1, 'product' => Products::find($id)]);
            
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
        
    }
    
    public function productExchange($id_user, $id_product, Request $request){
        
        $message;
        try {
            
            //actualizo stock del producto
            $product = Products::find($id_product);
            $product->stock = ($product->stock - 1);
            $product->save();
            
            //actualizo puntos del usuarios
            $dni = Dni::find($request->get('id_dni'));
            $dni->puntos = ($dni->puntos - $request->get('product_puntos'));
            $dni->save();
            
            //agrego el canje a table Exchange
            $canje = new Exchanges;
            $canje->id_user = $id_user;
            $canje->id_product = $id_product;
            $canje->status = 0;
            $canje->save();
            
            $message = "Felicitaciones! Su canje se realizo con exito!";
            
            return response()->json(['status' => 1, 'message' => $message]);
            
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
    }
    
}
