<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cities;
use App\Regions;
use App\Products;
use App\Dni;
use App\User;
use App\UsersProfile;
use App\UsersGanadores;
use App\Exchanges;
use App\GuestUsers;

class UserController extends Controller
{
    public function profileEdit()
    {
        $user_profile = UsersProfile::where('id_user', '=', Auth::user()->id)->get()->toArray();
        return view('frontend.user.profile', [
            'cities' => Cities::where('active', '=', 1)->get(),
            'regions' => Regions::where('active', '=', 1)->get(),
            'dni' => Dni::where('id_user', '=', Auth::user()->id)->get()->toArray(),
            'user_profile' => $user_profile,
            'cumple' => json_decode($user_profile[0]['date_year']),
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $message;
        try {
            
            $user = User::find($request->get('user_id'));
            $user->email = $request->get('user_email');
            $user->save();
                
            $user_profile = UsersProfile::find($request->get('user_profile_id'));
            
            if($user_profile->status != 1){
                $dni = Dni::find($request->get('dni_id'));
                $dni->puntos = ($dni->puntos + 20); // SI COMPLETA EL PERFIL POR PRIMERA VEZ, SE LE ASIGNAN 20 PUNTOS
                $dni->historical_puntos = ($dni->historical_puntos + 20);
                $dni->save();
            }
            
            $user_profile->sexo = $request->get('user_profile_sexo');
            $user_profile->date_year = json_encode($request->get('user_profile_date_year'));
            $user_profile->telephone = $request->get('user_profile_telephone');
            $user_profile->telephone_other = $request->get('user_profile_telephone_other');
            $user_profile->status = 1;
            $user_profile->save();
            
            $message = "Usuario editado con exito!";  
            
            return redirect('/usuario/mi-cuenta')->with('message', $message);
        
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

    public function indexExchanges()
    {
        return view('frontend.user.exchanges', [
            'exchanges' => Exchanges::where('id_user', '=', Auth::user()->id)->get()->toArray()
        ]);
    }

    public function showExchanges($id)
    {
        $exchange = Exchanges::find($id);
        $product = Products::where('id', '=', $exchange->id_product)->get();
        
        return view('frontend.user.exchange_single', [
            'exchange' => $exchange,
            'product' => $product[0]
        ]);
    }
    
    public function updateExchanges(Request $request)
    {
        $message;
        try {
            
            $exchange = Exchanges::find($request->get('id_exchange'));
            $exchange->status = 2;
            $exchange->save();
            
            $message = "Recepcion de Canje Confirmada con exito!";
            
            return redirect('/usuario/canjes')->with('message', $message);
        
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
    
    public function history()
    {
        return view('frontend.user.history', [
            'exchanges' => Exchanges::where('id_user', '=', Auth::user()->id)->get()->toArray(),
            'guests_user' => GuestUsers::where('id_user', '=', Auth::user()->id)->get()->toArray(),
            'user_profile' => UsersProfile::where('id_user', '=', Auth::user()->id)->get()->toArray(),
            'desempenos' => UsersGanadores::where('id_user', '=', Auth::user()->id)->get()->toArray()
        ]);
    }
}
