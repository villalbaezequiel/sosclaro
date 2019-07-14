<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Functions;
use App\Modals;
use App\Dni;

class DashboardController extends Controller
{
    public function index() {
        $userId = Auth::user()->id;
        $checkDni = Dni::where('id_user', '=', $userId)->get()->toArray();
        
        if(empty($checkDni[0])){
            return redirect('/validar-dni');
        } else {
            return view('frontend.dashboard.index', [
                'modals' => Modals::where('active', '=', 1)->get()
            ]);
        }
        
    }
}
