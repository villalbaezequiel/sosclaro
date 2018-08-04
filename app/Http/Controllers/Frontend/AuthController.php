<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Functions;
use App\Dni;
use App\User;
use App\UsersProfile;

class AuthController extends Controller
{
    
    public function indexRegister() {
        return view('frontend.auth.register');
    }
    
    public function storeRegister(Request $request) {
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

                //actualizar esto, el UsersProfile se crea cuando cargo los dni desde el BACKEND
                $userProfile = UsersProfile::find(UsersProfile::getIdForIdDni($checkDni[0]['id']));
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
                $message = "El DNI no se encuentra en nuestro sistema. Contactá a tu superior o mandanos un mail con tus datos a marketingoperativo@claro.com.ar";
                return redirect('/registro')->with('message', $message);
            
            } elseif($checkDni[0]['id_user'] != 0){
                $message = "Este DNI ya se encuentra registrado";
                return redirect('/registro')->with('message', $message);
                
            } elseif(!empty($checkEmail[0])){
                $message = "Email: ".$request->get('email')." ya se encuenta asociado a otro Usuario. ";
                return redirect('/registro')->with('message', $message);
                
            } else {
                return redirect('/login')->with('message', $message);
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
    
    public function showValidarDni(){
        return view('frontend.auth.validate_dni');
    }
    
    public function updateValidarDni(Request $request){
        $message;
        try {
    
            $userId = Auth::user()->id;
            $checkDni = Dni::where('dni', '=', $request->get('dni'))->get()->toArray();
            
            if(!empty($checkDni[0]) && $checkDni[0]['id_user'] == 0){
                
                $dni = Dni::find($checkDni[0]['id']);
                $dni->id_user = $userId;  
                $dni->name = $request->get('name');  
                $dni->last_name = $request->get('last_name');  
                $dni->save();
            }
            
            if(empty($checkDni[0])){
                $message = "El DNI no se encuentra en nuestro sistema. Contactá a tu superior o mandanos un mail con tus datos a marketingoperativo@claro.com.ar";
                return redirect('/validar-dni')->with('message', $message);
            
            } elseif($checkDni[0]['id_user'] != 0){
                $message = "Este DNI ya se encuentra registrado";
                return redirect('/validar-dni')->with('message', $message);
                
            } else {
                return redirect('/dashboard');
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
