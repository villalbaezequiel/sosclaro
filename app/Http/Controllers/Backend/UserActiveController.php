<?php

namespace App\Http\Controllers\Backend;

use App\CodigoFanbag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Support\Excel;
use Illuminate\Support\Facades\DB;

class UserActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users_update.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($request->hasFile('import_users_active')){
                $path = $request->file('import_users_active')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();
                $values = array();

                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $values[] =
                            array('id' => $value->id,
                                'active' => $value->active
                                );
                    }

                    if(!empty($values)){
                        foreach ($values as $val) {

                            $value = (object) $val;

                            $user = User::where('id', '=', $value->id)->first();
                            if($user && $user->active != $value->active){
                                $user->active = $value->active;
                                $user->save();
                            }
                        }
                    }

                    return response()->json(['estado' => true]);

                } else {
                    return response()->json(['estado' => false]);
                }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
