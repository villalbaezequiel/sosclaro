<?php

namespace App\Http\Controllers\Backend;

use App\Agentes;
use App\CodigoFanbag;
use App\Http\Controllers\Controller;
use App\Provinces;
use App\UsersAllowed;
use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

class CodigosFanbagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.codigos_fanbag.index', [
            'codigos' => CodigoFanbag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.codigos_fanbag.create');
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
            if($request->hasFile('import_codigos')){
                $path = $request->file('import_codigos')->getRealPath();
                $data = Excel::load($path, function($reader) {})
                    ->ignoreEmpty()
                    ->get();
                $values = array();

                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $values[] =
                            array('fanbag' => $value->fanbag,
                                'codigo_voucher' => $value->codigovoucher,
                                'expire' => $value->vigencia_de_uso,
                                'active' => 0);
                    }

                    if(!empty($values)){
                        foreach ($values as $val) {

                            $value = (object) $val;

                            if (!is_null($value->fanbag)) {
                                $searchCodigo = CodigoFanbag::where('codigo_fanbag', '=', $value->codigo_voucher)->get();
                                if(!$searchCodigo->count()){

                                    $insert = new CodigoFanbag();
                                    $insert->fanbag = $value->fanbag;
                                    $insert->codigo_fanbag = $value->codigo_voucher;
                                    $insert->active = $value->active;
                                    $insert->expire = $expected = new \DateTime($value->expire);

                                    $insert->save();

                                }
                            }


                        }
                    }

                    return response()->json(['estado' => true]);
                    // return response()->json(['preview' => $values]);
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
