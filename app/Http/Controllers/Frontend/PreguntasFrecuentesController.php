<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PreguntasFrecuentes;

class PreguntasFrecuentesController extends Controller
{
    public function index()
    {
        return view('frontend.preguntas_frecuentes', [
            'preguntas_frecuentes' => PreguntasFrecuentes::where('active', 1)->orderBy('id', 'desc')->get()
        ]);
    }
}
