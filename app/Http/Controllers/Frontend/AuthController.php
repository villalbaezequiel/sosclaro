<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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

                $userProfile = new UsersProfile;
                $userProfile->id_user = $user->id;
                $userProfile->save();
                
                $dni = Dni::find($checkDni[0]['id']);
                $dni->id_user = $user->id;  
                $dni->name = $request->get('dni_name');  
                $dni->last_name = $request->get('dni_last_name');  
                $dni->save(); 
                
                $message = "Usuario Alias: ".$request->get('name')." creado con exito! DNI: ". $request->get('dni');
            }
            
            if(empty($checkDni[0])){
                $message = "DNI: ".$request->get('dni')." no se encontró en nuestro sistema. Verifique el mismo o Comuniquese con Atencion al Cliente. Gracias!";
            } elseif($checkDni[0]['id_user'] != 0){
                $message = "DNI: ".$request->get('dni')." ya se encuenta asociado a otro Usuario. Verifique el mismo o Comuniquese con Atencion al Cliente. Gracias!";
            } elseif(!empty($checkEmail[0])){
                $message = "Email: ".$request->get('email')." ya se encuenta asociado a otro Usuario. Verifique el mismo o Comuniquese con Atencion al Cliente. Gracias!";
            }
             
            
            return redirect('/registro')->with('message', $message);
        
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
