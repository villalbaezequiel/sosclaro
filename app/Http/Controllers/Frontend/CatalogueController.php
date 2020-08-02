<?php

namespace App\Http\Controllers\Frontend;

use App\CodigoFanbag;
use App\Http\Controllers\Backend\MeliController;
use App\Meli;
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
use Illuminate\Support\Facades\Session;

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


        try {

            if($request->get('data')){

                DB::beginTransaction();

                $data = $request->get('data');

                if(isset($data['is_fanbag'])) {
                    if($data['email_fanbag'] != $data['email_fanbag_repeat']) {
                        DB::rollback();
                        $message = 'Los emails deben coincidir. Por favor intente nuevamente.';
                        return back()->withErrors($message);
                    }
                }

                //actualizo stock del producto
                $product = Products::find($data['id_product']);

                if ($product->stock == 0) {
                  DB::rollback();
                  $message = 'No hay más stock de este producto.';

                  return back()->withErrors($message);
                }

                $product->stock = ($product->stock - 1);


                //actualizo puntos del usuarios
                $dni = Dni::find($data['id_dni']);

                if ($dni->puntos - $data['product_puntos'] < 0) {
                  DB::rollback();
                  $message = 'No tienes los puntos suficientes para realizar este canje.';

                  return back()->withErrors($message);
                }

                //puntos antes del canje
                $puntos_before_exchange = $dni->puntos;

                $dni->puntos = ($dni->puntos - $data['product_puntos']);


                //get and update codigo fanbag
                $codigoFanbag = $this->getAndUpdateCodigoFanbag($data['id_product']);

                if (is_null($codigoFanbag) ) {
                    DB::rollback();
                    $message = 'No se encontro ningún producto Fanbag disponible.';
                    return back()->withErrors($message);
                }

                //agrego el canje a table Exchange
                $canje = new Exchanges;
                $canje->id_user = $data['id_user'];
                $canje->id_product = $data['id_product'];
                $canje->puntos_before_exchange = $puntos_before_exchange;
                $canje->status = 1;

                if (is_null($canje->puntos_before_exchange) || $canje->puntos_before_exchange == 0 ) {
                    DB::rollback();
                    $message = 'Error en el sistema. Por favor intente nuevamente.';

                    return back()->withErrors($message);
                }

                if (isset($codigoFanbag)) {
                    $canje->codigo_fanbag = $codigoFanbag->codigo_fanbag;
                    $canje->email_ml = $data['email_fanbag'];
                    $canje->status = 2;
                }

                if($product->is_fanbag && is_null($canje->codigo_fanbag)) {
                    DB::rollback();
                    $message = 'No se ha encontrado un código Fanbag';
                    return back()->withErrors($message);
                }

                $product->save();
                $dni->save();
                $canje->save();

                DB::commit();

                //Envio de información por mail

                $user = User::find($data['id_user']); // informacion del Usuario/Vendedor que proceso el Canje


                if(isset($data['is_fanbag']) and $data['is_fanbag'] == true) {
                    $this->sendEmailAndAlerts($canje, $product, $dni, $user, $codigoFanbag->codigo_fanbag);
                    return \Response::json(['status' => 1, 'codigo_fanbag' => $codigoFanbag->codigo_fanbag]);

                } else {
                    $this->sendEmailAndAlerts($canje, $product, $dni, $user);
                    return \Response::json(['status' => 1]);
                }


            }

        } catch(\Exception $e) {

            DB::rollback();

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


    public function productML($data, $ml) {


        try {

            if($data){

                DB::beginTransaction();

                //actualizo stock del producto
                $product = Products::find($data['id_product']);

                if ($product->stock == 0) {
                    DB::rollback();
                    $message = 'No hay más stock de este producto.';

                    return back()->withErrors($message);
                }

                $product->stock = ($product->stock - 1);

                //actualizo puntos del usuarios
                $dni = Dni::find($data['id_dni']);

                if ($dni->puntos - $data['product_puntos'] < 0) {
                    DB::rollback();
                    $message = 'No tienes los puntos suficientes para realizar este canje.';

                    return back()->withErrors($message);
                }

                //puntos antes del canje
                $puntos_before_exchange = $dni->puntos;
                $dni->puntos = ($dni->puntos - $data['product_puntos']);

                //agrego el canje a table Exchange
                $canje = new Exchanges;
                $canje->id_user = $data['id_user'];
                $canje->id_product = $data['id_product'];
                $canje->puntos_before_exchange = $puntos_before_exchange;
                $canje->status = 1;
                $canje->nickname_ml = $ml->nickname;
                $canje->ID_ML = $ml->id;
                $canje->email_ml = $ml->email;

                if (is_null($canje->puntos_before_exchange) || $canje->puntos_before_exchange == 0 ) {
                    DB::rollback();
                    $message = 'Error en el sistema. Por favor intente nuevamente.';

                    return back()->withErrors($message);
                }

                $product->save();

                $dni->save();

                $canje->save();

                DB::commit();

                //Envio de información por mail

                $user = User::find($data['id_user']); // informacion del Usuario/Vendedor que proceso el Canje

                $this->sendEmailAndAlerts($canje, $product, $dni, $user);
                return redirect('/catalogo/producto/success_ml');

            }

        } catch(\Exception $e) {

            DB::rollback();

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

    public function productSuccessFanbag() {

        return view('frontend.catalogue.success_fanbag');
    }



    private function getAndUpdateCodigoFanbag($id_product) {
        $codigoFanbag = CodigoFanbag::where('active', '=', 0)->where('id_product', '=', $id_product)->first();

        if ($codigoFanbag) {
            $codigoFanbag->active = 1;
            $codigoFanbag->save();
        }

        return $codigoFanbag;
    }

    private function sendEmailAndAlerts($canje, $product, $dni, $user, $code_fanbag = NULL) {
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

        if (is_null($code_fanbag)) {
            Functions::sendMail('emails.canje_vendedor', ['url' => config('app.url'), 'product' => $product], $callbackUserVendedor);
        }
        else {
            Functions::sendMail('emails.canje_fanbag', ['url' => config('app.url'), 'product' => $product, 'code_fanbag' => $code_fanbag], $callbackUserVendedor);

        }


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
    }

}
