<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modals;

class DashboardController extends Controller
{
    public function index() {
        return view('frontend.dashboard.index', [
            'modals' => Modals::where('active', '=', 1)->get()
        ]);
    }
}
