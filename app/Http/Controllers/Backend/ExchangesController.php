<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Support\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Functions;
use App\Dni;
use App\Exchanges;
use App\Products;
use App\User;
use Meli;

class ExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.exchanges.index', [
            'exchanges' => Exchanges::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.exchanges.show', [
            'exchange' => Exchanges::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.exchanges.edit', [
            'exchange' => Exchanges::find($id)
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
          $canje = Exchanges::find($id);
          $canje->status = $request->get('exchange_status');
          $canje->save();
            
          if($request->get('exchange_status') == 1){
              
            $mailTo = array('email' => User::getEmail($canje->id_user), 'name' => Dni::getName($canje->id_user));
            $callback = function ($m) use ($mailTo) {
              $m->from('no-reply@mejoresvendedores.com.ar', 'Admin MejoresVendedores');
              $m->to($mailTo['email'], $mailTo['name'])->subject('¡Canje en Transito!');
            };
            Functions::sendMail('emails.canje_change_status', ['url' => config('app.url'), 'canje' => $canje], $callback);
          }
            
          $message = "Canje #".$id." editado con exito!";
            
          return redirect('/admin/exchanges')->with('message', $message);
            
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
	}    }

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
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('canjes_users_'.$timestamp, function($excel) {
 
            $excel->sheet('Canjes Usuarios', function($sheet) {
                
                $canjes = DB::table('exchanges')
                        ->select('exchanges.id_user', 'exchanges.id_product', 'products.name as name_product', 'products.codigo as codigo_product', 'exchanges.status', 'exchanges.created_at')
                        ->join('products', 'products.id', '=', 'exchanges.id_product')
                        ->orderBy('exchanges.id', 'desc')
                        ->get();
                
		foreach($canjes as &$canje){
                    $canje->dni_user = Dni::getDni($canje->id_user);
		}
           
                $sheet->fromArray(json_decode( json_encode($canjes), true));
 
            });
            
        })->export('xls');
    }
    
}
