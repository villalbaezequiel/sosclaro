<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
    public function login() {
        return view('frontend.auth.signin');
    }
    
    public function register() {
        return view('frontend.auth.register');
    }
    
    public function passwordRecovery() {
        return view('frontend.auth.password-recovery');
    }
    
}
