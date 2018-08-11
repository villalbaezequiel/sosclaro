<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Functions;
use App\User;
use App\Products;
use App\Exchanges;
use App\Dni;

class CatalogueController extends Controller
{
    
    public function index() {
        return view('frontend.catalogue.index', [
            'products' => Products::where('active', '=', 1)->get()
        ]);
    }
    
    public function productShow($id) {
        return view('frontend.catalogue.product', [
            'product' => Products::find($id)
        ]);
    }
    
    public function productExchange(Request $request){
        
       $message;
        try {
            
            //actualizo stock del producto
            $product = Products::find($request->get('id_product'));
            $product->stock = ($product->stock - 1);
            $product->save();
            
            //actualizo puntos del usuarios
            $dni = Dni::find($request->get('id_dni'));
            $dni->puntos = ($dni->puntos - $request->get('product_puntos'));
            $dni->save();
            
            //agrego el canje a table Exchange
            $canje = new Exchanges;
            $canje->id_user = $request->get('id_user');
            $canje->id_product = $request->get('id_product');
            $canje->status = 0;
            $canje->save();
            
            // send mail to Admin new Canje
            $user = User::find($request->get('id_user'));
            $mailTo = array('email' => 'villalbaezequiel64@gmail.com', 'name' => 'EV'); //SET MAIL ADMIN         
            $callback = function ($m) use ($mailTo) {
              $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
              $m->to($mailTo['email'], $mailTo['name'])->subject('¡Nuevo Canje!');
            };
            Functions::sendMail('emails.canje', ['url' => config('app.url'), 'canje' => $canje, 'product' => $product, 'dni' => $dni, 'user' => $user], $callback);
            
          // send mail alerta de STOCK de Producto
          if($product->stock <= $product->notification){
            $callback = function ($m) use ($mailTo) {
              $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
              $m->to($mailTo['email'], $mailTo['name'])->subject('¡Alerta de Stock de Producto!');
            };
            Functions::sendMail('emails.stock_product', ['url' => config('app.url'), 'product' => $product], $callback);   
          }
            
            
            $message = "Felicitaciones!";

            return redirect('/catalogo/producto/success')->with('message', $message);
            
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
    
    public function productSuccess() {
        return view('frontend.catalogue.success');
    }
    
}
