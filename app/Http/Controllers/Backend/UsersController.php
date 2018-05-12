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
use Illuminate\Support\Facades\DB;

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
        Excel::create('export_users_'.$timestamp, function($excel) use ($request){
 
            $excel->sheet('Usuarios', function($sheet) use($request) {
 
                $users = DB::table('users')->select('dni.dni', 'dni.name', 'dni.last_name', 'users.email', 'dni.puntos', 'users_profile.id_region', 'users_profile.sexo as gender', 'users_profile.date_year', 'users_profile.telephone', 'users_profile.telephone_other', 'users_profile.address', 'users_profile.status as full_profile', 'users.active', 'users.created_at', 'dni.updated_at')
                        ->join('dni', 'dni.id_user', '=', 'users.id')
                        ->join('users_profile', 'users_profile.id_user', '=', 'users.id')
                        ->where('users.active', $request->get('active_users'))
                        ->get();
                
                $sheet->fromArray(json_decode( json_encode($users), true));
 
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
