<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regions;
use App\UsersGanadores;

class DesempenoController extends Controller
{
    public function index() {
        return view('frontend.desempeno', [
            'regions' => Regions::all(),
            'users_ganadores' => UsersGanadores::where('mes', '=', 'Mayo')->get()->toArray(),
        ]);
    }
}
