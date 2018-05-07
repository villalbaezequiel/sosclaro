<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Functions;
use App\User;
use App\UsersProfile;
use App\Dni;
use App\Cities;
use App\Regions;
use App\Indicadores;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timestamp = date('Y_m_d_h_i_s');
        $active = $request->get('active_users');
        Excel::create('export_users_'.$timestamp, function($excel) {
 
            $excel->sheet('Usuarios', function($sheet) {
 
                //hacer join con datos de model DNI y UsersProfile
                //$users = User::where('active', '=',$active)->get();
                $users = User::all();
                $sheet->fromArray($users);
 
            });
            
        })->export('xls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.users.edit', [
            'user' => User::find($id),
            'user_profile' => UsersProfile::where('id_user', '=', $id)->get(),
            'user_dni' => Dni::where('id_user', '=', $id)->get(),
            'cities' => Cities::all(),
            'regions' => Regions::all(),
            'indicadores' => Indicadores::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message;
        try {
            
            $user = User::find($id);
            $user->name = $request->get('name_user');    
            $user->email = $request->get('email_user');    
            $user->active = $request->get('active_user');    
            $user->save();    
            
            if($request->get('id_user_profile')){
                $user_profile = UsersProfile::find($request->get('id_user_profile'));
                $user_profile->id_city = $request->get('city_user_profile');    
                $user_profile->id_region = $request->get('region_user_profile');    
                $user_profile->telephone = $request->get('telephone_user_profile');    
                $user_profile->telephone_other = $request->get('telephone_other_user_profile');    
                $user_profile->address = $request->get('address_user_profile');    
                $user_profile->save();    
            }
                       
            $message = "Usuario: ".$request->get('name_user')." editado con exito! DNI: ". $request->get('dni');
            
            return redirect('/admin/users')->with('message', $message);
        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $user = User::find($id);
        $user->delete();
    
        if($request->get('id_user_profile')){
            $user_profile = UsersProfile::find($request->get('id_user_profile'));
            $user_profile->delete();
        }
    
        Dni::setIdUser($request->get('id_dni'));
        
     
        return redirect('/admin/users')->with('message', 'Usuario eliminada con exito!');
    }
}
