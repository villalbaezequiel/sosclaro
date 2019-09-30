<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function productExchange(Request $request) {
        $message;
        try {

            if($request->get('data')){

                DB::beginTransaction();

                $data = $request->get('data');

                //actualizo stock del producto
                $product = Products::find($data['id_product']);

                if ($product->stock == 0) {
                  DB::rollback();
                  $message = 'No hay más stock de este producto.';

                  return back()->withErrors($message);
                }

                $product->stock = ($product->stock - 1);
                $product->save();

                //actualizo puntos del usuarios
                $dni = Dni::find($data['id_dni']);

                if ($dni->puntos - $data['product_puntos'] < 0) {
                  DB::rollback();
                  $message = 'No tienes los puntos suficientes para realizar este canje.';

                  return back()->withErrors($message);
                }

                $dni->puntos = ($dni->puntos - $data['product_puntos']);
                $dni->save();


                //agrego el canje a table Exchange
                $canje = new Exchanges;
                $canje->id_user = $data['id_user'];
                $canje->id_product = $data['id_product'];

                if($data['nickname_ml']){
                $canje->nickname_ml = $data['nickname_ml'];
                }

                if($data['id_ml']){
                $canje->ID_ML = $data['id_ml'];
                }

                if($data['profile_ml']){
                $canje->profile_ml = $data['profile_ml'];
                }

                $canje->status = 0;
                $canje->save();

                DB::commit();

                //Envio de información por mail

                $user = User::find($data['id_user']); // informacion del Usuario/Vendedor que proceso el Canje

                // --- Send Mail to Admin new Canje ---
                // List Emails sending
                $mailTo = array('email' => 'marketingoperativo@claro.com.ar', 'name' => 'Marketing Operativo');
                $mailCc = array('email' => 'lucas.marozzi@claro.com.ar', 'name' => 'Lucas Marozzi');

                $callback = function ($m) use ($mailTo, $mailCc) {
                    $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
                    $m->subject('¡Nuevo Canje!');
                    $m->to($mailTo['email'], $mailTo['name']);
                    $m->cc($mailCc['email'], $mailCc['name']);
                    };
                Functions::sendMail('emails.canje', ['url' => config('app.url'), 'canje' => $canje, 'product' => $product, 'dni' => $dni, 'user' => $user], $callback);


                // --- Envio Mail al Usuario/Vendedor que proceso el Canje ---
                $callbackUserVendedor = function ($m) use ($user, $dni) {
                    $m->from('no-reply@mejoresvendedores.com.ar', 'MejoresVendedores');
                    $m->subject('¡Nuevo Canje!');
                    $m->to($user->email, $dni->name.' '.$dni->last_name);
                };

                Functions::sendMail('emails.canje_vendedor', ['url' => config('app.url'), 'product' => $product], $callbackUserVendedor);


                // send mail alerta de STOCK de Producto
                if($product->stock <= $product->notification){
                    $callbackASP = function ($m) use ($mailTo, $mailCc) {
                      $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
                      $m->subject('¡Alerta de Stock de Producto!');
                      $m->to($mailTo['email'], $mailTo['name']);
                      $m->cc($mailCc['email'], $mailCc['name']);
                    };
                Functions::sendMail('emails.stock_product', ['url' => config('app.url'), 'product' => $product], $callbackASP);
                }

              return \Response::json(['status' => 1]);

            } else {

                DB::beginTransaction();

                //actualizo stock del producto
                $product = Products::find($request->get('id_product'));
                if ($product->stock == 0) {
                    DB::rollback();
                    $message = 'No hay más stock de este producto.';

                    return back()->withErrors($message);
                }

                $product->stock = ($product->stock - 1);
                $product->save();

                //actualizo puntos del usuarios
                $dni = Dni::find($request->get('id_dni'));

                if ($dni->puntos - $request->get('product_puntos') < 0) {
                    DB::rollback();
                    $message = 'No tienes los puntos suficientes para realizar este canje.';

                    return back()->withErrors($message);
                }

                $dni->puntos = ($dni->puntos - $request->get('product_puntos'));
                $dni->save();

                //agrego el canje a table Exchange
                $canje = new Exchanges;
                $canje->id_user = $request->get('id_user');
                $canje->id_product = $request->get('id_product');

                if($request->get('nickname_ml')){
                    $canje->nickname_ml = $request->get('nickname_ml');
                }

                if($request->get('id_ml')){
                    $canje->ID_ML = $request->get('id_ml');
                }

                if($request->get('profile_ml')){
                    $canje->profile_ml = $request->get('profile_ml');
                }

                $canje->status = 0;
                $canje->save();

                DB::commit();

                $user = User::find($request->get('id_user')); // informacion del Usuario/Vendedor que proceso el Canje

                // --- Send Mail to Admin new Canje ---
                // List Emails sending
                $mailTo = array('email' => 'marketingoperativo@claro.com.ar', 'name' => 'Marketing Operativo');
                $mailCc = array('email' => 'lucas.marozzi@claro.com.ar', 'name' => 'Lucas Marozzi');

                $callback = function ($m) use ($mailTo, $mailCc) {
                  $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
                  $m->subject('¡Nuevo Canje!');
                  $m->to($mailTo['email'], $mailTo['name']);
                  $m->cc($mailCc['email'], $mailCc['name']);
                };
                Functions::sendMail('emails.canje', ['url' => config('app.url'), 'canje' => $canje, 'product' => $product, 'dni' => $dni, 'user' => $user], $callback);


                // --- Envio Mail al Usuario/Vendedor que proceso el Canje ---
                $callbackUserVendedor = function ($m) use ($user, $dni) {
                  $m->from('no-reply@mejoresvendedores.com.ar', 'MejoresVendedores');
                  $m->subject('¡Nuevo Canje!');
                  $m->to($user->email, $dni->name.' '.$dni->last_name);
                };
                Functions::sendMail('emails.canje_vendedor', ['url' => config('app.url'), 'product' => $product], $callbackUserVendedor);


                // send mail alerta de STOCK de Producto
                if($product->stock <= $product->notification){
                  $callbackASP = function ($m) use ($mailTo, $mailCc) {
                    $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
                    $m->subject('¡Alerta de Stock de Producto!');
                    $m->to($mailTo['email'], $mailTo['name']);
                    $m->cc($mailCc['email'], $mailCc['name']);
                  };
                  Functions::sendMail('emails.stock_product', ['url' => config('app.url'), 'product' => $product], $callbackASP);
                }

                $message = "Felicitaciones!";

                return redirect('/catalogo/producto/success')->with('message', $message);

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

    public function productSuccess() {
        return view('frontend.catalogue.success');
    }

    public function productSuccessMl() {
        return view('frontend.catalogue.success_ml');
    }

}
