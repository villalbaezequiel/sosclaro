<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Regions;
use App\UsersGanadores;
use App\Dni;
use App\Functions;
use App\DesempenoName;

class DesempenoController extends Controller
{
    public function index()
    {    
      $allDesempeno= DB::table('desempeno')
                    ->where('id_user', '=', Auth::user()->id)
                    ->whereMonth('created_at', '=', date('n'))
                    ->orderBy('id', 'DESC')
                    ->get();
      
      $ultimoDesempeno = DB::table('desempeno')
                        ->where('id_user', '=', Auth::user()->id)
                        ->orderBy('id', 'DESC')
                        ->whereMonth('created_at', '=', date('n'))
                        ->get();
      
      $puntos = 0;
      $total = 0;
      foreach($ultimoDesempeno as $val){
        $puntos += $val->puntos;
        $total += $val->total;
      }  
      
      $last_perfomance = array(
        'puntos' => $puntos,
        'total' => $total
      );
      
      return view('frontend.desempeno', [
        'all_desempeno' => $allDesempeno,
        'ultimo_desempeno' => $last_perfomance
      ]);
    }
    
    public function desempenosForName($name) {
        return response()->json(['desempenos' => UsersGanadores::where('especification', '=', $name)->orderBy('puntos', 'DESC')->get()]);
    }
    
    public function grafico()
    {    
      $data = array();
      foreach(Functions::getMonths() as $key => $value){
        $month = DB::table('desempeno')
                    ->where('id_user', '=', Auth::user()->id)
                    ->whereMonth('created_at', '=', $key)
                    ->orderBy('id', 'DESC')
                    ->get(); 
        $puntos = 0;
        foreach($month as $v){
          $puntos += $v->puntos;
        }
        $data[$value] = $puntos;
      }
      return response()->json(['allDesempeno' => $data]);
    }
    
    public function desempenosForMonth($month)
    {  
      $desempenosForMonth = DB::table('desempeno')
                            ->select('created_at', 'asunto', 'puntos')
                            ->where('id_user', '=', Auth::user()->id)
                            ->whereMonth('created_at', '=', $month)
                            ->orderBy('id', 'DESC')
                            ->get();
      foreach($desempenosForMonth as &$desempeno){
        $desempeno->created_at = \App\Functions::getDate($desempeno->created_at);
      }
      return response()->json(['desempenos_for_month' => $desempenosForMonth]);
    } 
}
