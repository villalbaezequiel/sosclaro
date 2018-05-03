<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regions;

class UserController extends Controller
{
    public function profile() {
        return view('frontend.user.profile', [
            'regions' => Regions::where('active', '=', 1)->get()
        ]);
    }

    public function exchanges() {
        return view('frontend.user.exchanges');
    }

    public function singleExchange() {
        return view('frontend.user.exchange_single');
    }
    
    public function history() {
        return view('frontend.user.history');
    }
}
