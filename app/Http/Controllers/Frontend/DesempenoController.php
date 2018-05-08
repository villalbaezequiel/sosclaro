<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Regions;
use App\UsersGanadores;
use App\Dni;
use App\DesempenoName;

class DesempenoController extends Controller
{
    public function index() {
        
        $desempeno_user = UsersGanadores::where('dni', '=', Dni::getDni(Auth::user()->id))->orderBy('id', 'DESC')->get()->toArray();
        return view('frontend.desempeno', [
            'desempenos_name' => DesempenoName::all(),
            'desempeno_user' => $desempeno_user[0],
            'regions' => Regions::all()
        ]);
    }
    
    public function desempenosForName($name) {
        return response()->json(['desempenos' => UsersGanadores::where('especification', '=', $name)->orderBy('puntos', 'DESC')->get()]);
    }
    
}
