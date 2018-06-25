<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Functions;
use App\Dni;
use App\User;
use App\UsersProfile;
use App\Regions;
use App\Exchanges;
use App\GuestUsers;
use App\Products;
use App\Guest;

class UserApiController extends Controller
{
    
    public function store(Request $request)
    {
        $message;
        try {
            
            $checkDni = Dni::where('dni', '=', $request->get('dni'))->get()->toArray();
            $checkEmail = User::where('email', '=', $request->get('email'))->get()->toArray();
            
            if(!empty($checkDni[0]) && $checkDni[0]['id_user'] == 0 && empty($checkEmail[0])){
                $user = new User;
                $user->name = ' ';    
                $user->email = $request->get('email');    
                $user->password = bcrypt($request->get('password'));    
                $user->active = 1;    
                $user->save(); 

                $userProfile = new UsersProfile;
                $userProfile->id_user = $user->id;
                $userProfile->id_role = 2;
                $userProfile->save();
                
                $dni = Dni::find($checkDni[0]['id']);
                $dni->id_user = $user->id;  
                $dni->name = $request->get('dni_name');  
                $dni->last_name = $request->get('dni_last_name');  
                $dni->save(); 
                
                $message = "Usuario: creado con exito!";
            }
            
            if(empty($checkDni[0])){
                $message = "El DNI no se encuentra en nuestro sistema. Contacta a tu superior o mandanos un mail con tus datos a marketingoperativo@claro.com.ar";
                return response()->json(['status' => 0, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
            
            } elseif($checkDni[0]['id_user'] != 0){
                $message = "Este DNI ya se encuentra registrado";
                return response()->json(['status' => 0, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
                
            } elseif(!empty($checkEmail[0])){
                $message = "Email: ".$request->get('email')." ya se encuenta asociado a otro Usuario. ";
                return response()->json(['status' => 0, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);

            } else {
                return response()->json(['status' => 1, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
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

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
    }
    
    public function login(Request $request)
    {    
        try {
            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'active' => 1])) {

                $user = Auth::user()->toArray();
                $data = array_merge($user, array("dni" => Dni::getDni(Auth::user()->id), "short_name" => Dni::getNameShort(Auth::user()->id), "full_name" => Dni::getName(Auth::user()->id), "puntos" => Dni::getPuntos(Auth::user()->id), "full_profile" => UsersProfile::getStatus(Auth::user()->id)));
                return response()->json(['status' => 1, 'user' => $data], 200, [], JSON_UNESCAPED_UNICODE);

            } else {

                return response()->json(['status' => 0, 'user' => " "], 200, [], JSON_UNESCAPED_UNICODE);

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

            return \Response::json(['status' => 0, 'message' => $respuesta]);
	}
        
    }
    
    public function logout()
    {
        $message;
        try {
            Auth::logout();
            $message = "Seccion cerrada";
            return response()->json(['status' => 1, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
        
        } catch (Exception $ex) {
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
    
    public function miCuenta($id_user, Request $request)
    {    
        $message;
        try{
            
            $user = User::find($id_user);
            $usersProfile = UsersProfile::where('id_user', '=', $id_user)->get()->toArray();
            $dni = Dni::where('id_user', '=', $id_user)->get()->toArray();
            $year_user = json_decode($usersProfile[0]['date_year']);
            $regions = Regions::where('active', '=', 1)->get()->toArray();
            
            return response()->json(['status' => 1, 'user' => $user, 'users_profile' => $usersProfile, 'dni' => $dni, 'year_user' => $year_user, 'regions' => $regions], 200, [], JSON_UNESCAPED_UNICODE);
            
            
        } catch (Exception $ex) {
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
    
    public function update($id_user, Request $request)
    {    
        $message;
        try {
            
            $user_profile = UsersProfile::find($request->get('user_profile_id'));
            
            if($user_profile->status != 1){
                $user = User::find($id_user);
                $user->name = $request->get('user_name');
                $user->email = $request->get('user_email');
                $user->save();

                $dni = Dni::find($request->get('dni_id'));
                $dni->name = $request->get('dni_name');
                $dni->last_name = $request->get('dni_last_name');
                $dni->puntos = ($dni->puntos + 20);
                $dni->save();


                $user_profile->sexo = $request->get('user_profile_sexo');
                $user_profile->date_year = json_encode($request->get('user_profile_date_year'));
                $user_profile->telephone = $request->get('user_profile_telephone');
                $user_profile->telephone_other = $request->get('user_profile_telephone_other');
                $user_profile->address = $request->get('user_profile_address');
                $user_profile->id_city = $request->get('user_profile_id_city');
                $user_profile->id_region = $request->get('user_profile_id_region');
                $user_profile->status = 1;
                $user_profile->save();

                $message = "Usuario: ".$request->get('user_name')." editado con exito!";    
            } else {
                $user = User::find($id_user);
                $user->name = $request->get('user_name');
                $user->email = $request->get('user_email');
                $user->save();

                $dni = Dni::find($request->get('dni_id'));
                $dni->name = $request->get('dni_name');
                $dni->last_name = $request->get('dni_last_name');
                $dni->save();


                $user_profile->sexo = $request->get('user_profile_sexo');
                $user_profile->date_year = json_encode($request->get('user_profile_date_year'));
                $user_profile->telephone = $request->get('user_profile_telephone');
                $user_profile->telephone_other = $request->get('user_profile_telephone_other');
                $user_profile->address = $request->get('user_profile_address');
                $user_profile->id_city = $request->get('user_profile_id_city');
                $user_profile->id_region = $request->get('user_profile_id_region');
                $user_profile->status = 1;
                $user_profile->save();

                $message = "Usuario: ".$request->get('user_name')." editado con exito!";  
            }
            
            return response()->json(['status' => 1, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
        
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
    
    public function history($id_user)
    { 
        $message;
        try { 
            
            return \Response::json(['status' => 1, 'exchanges' => Exchanges::where('id_user', '=', $id_user)->get()->toArray(), 
                                                   'guests_user' => GuestUsers::where('id_user', '=', $id_user)->get()->toArray(),
                                                   'user_profile' => UsersProfile::where('id_user', '=', $id_user)->get()->toArray(),
                                                   'puntos' => Dni::getPuntos($id_user)]);
            
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
    
    public function allCanjes($id_user)
    {   
        $message;
        try {
            
            $exchanges = Exchanges::where('id_user', '=', $id_user)->get()->toArray();
            foreach ($exchanges as &$value) {
                $value['url_image'] = asset(Products::getUrlImage($value['id_product']));
                $value['name_product'] = Products::getName($value['id_product']);
                $value['value_product'] = Products::getValuePuntos($value['id_product']);
            }
            
            return response()->json(['status' => 1, 'exchanges' => $exchanges], 200, [], JSON_UNESCAPED_UNICODE);
            
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
    
    public function singleCanje($id_canje)
    {    
        $message;
        try {
            
            $exchange = Exchanges::find($id_canje);
            $product = Products::where('id', '=', $exchange->id_product)->get()->toArray();

            foreach ($product as &$value) {
                $value['image'] = asset(Products::getUrlImage($value['id']));
            }
            
            return response()->json(['status' => 1, 'exchange_id' => $exchange->id, 'product' => $product[0]], 200, [], JSON_UNESCAPED_UNICODE);
            
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
    
    public function singleCanjeConfirmar($id_canje)
    {    
        $message;
        try {
            
            $exchange = Exchanges::find($id_canje);
            $exchange->status = 2;
            $exchange->save();
            
            $message = "Recepcion de Canje Confirmada con exito!";
            
            return response()->json(['status' => 1, 'message' => $message], 200, [], JSON_UNESCAPED_UNICODE);
        
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
