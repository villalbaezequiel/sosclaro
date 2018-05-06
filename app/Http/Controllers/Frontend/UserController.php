<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cities;
use App\Regions;
use App\Dni;
use App\User;
use App\UsersProfile;

class UserController extends Controller
{
    public function profileEdit()
    {
        return view('frontend.user.profile', [
            'cities' => Cities::where('active', '=', 1)->get(),
            'regions' => Regions::where('active', '=', 1)->get(),
            'dni' => Dni::where('id_user', '=', Auth::user()->id)->get()->toArray(),
            'user_profile' => UsersProfile::where('id_user', '=', Auth::user()->id)->get()->toArray()
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $message;
        try {
            
            $user = User::find($request->get('user_id'));
            $user->name = $request->get('user_name');
            $user->email = $request->get('user_email');
            $user->save();
            
            $dni = Dni::find($request->get('dni_id'));
            $dni->name = $request->get('dni_name');
            $dni->last_name = $request->get('dni_last_name');
            $dni->save();
            
            $user_profile = UsersProfile::find($request->get('user_profile_id'));
            $user_profile->sexo = $request->get('user_profile_sexo');
            $user_profile->date_year = json_encode($request->get('user_profile_date_year'));
            $user_profile->telephone = $request->get('user_profile_telephone');
            $user_profile->telephone_other = $request->get('user_profile_telephone_other');
            $user_profile->address = $request->get('user_profile_address');
            $user_profile->id_city = $request->get('user_profile_id_city');
            $user_profile->id_region = $request->get('user_profile_id_region');
            $user_profile->status = 1;
            $user_profile->save();
            
            $message = "Usuario Alias: ".$request->get('user_name')." editado con exito!";
            
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

    public function exchanges()
    {
        return view('frontend.user.exchanges');
    }

    public function singleExchange()
    {
        return view('frontend.user.exchange_single');
    }
    
    public function history()
    {
        return view('frontend.user.history');
    }
}
