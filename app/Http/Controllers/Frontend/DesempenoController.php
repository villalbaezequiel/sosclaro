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
                        ->limit(1)
                        ->get();
        
      return view('frontend.desempeno', [
        //'desempenos_name' => DesempenoName::all(),
        //'desempeno_user' => $desempeno_user[0],
        //'regions' => Regions::all()
        'all_desempeno' => $allDesempeno,
        'ultimo_desempeno' => $ultimoDesempeno
      ]);
    }
    
    public function desempenosForName($name) {
        return response()->json(['desempenos' => UsersGanadores::where('especification', '=', $name)->orderBy('puntos', 'DESC')->get()]);
    }
    
    public function grafico() {
        $allDesempeno= DB::table('desempeno')
                                ->where('id_user', '=', Auth::user()->id)
                                ->orderBy('id', 'DESC')
                                ->get();
        
        return response()->json(['allDesempeno' => $allDesempeno]);
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
