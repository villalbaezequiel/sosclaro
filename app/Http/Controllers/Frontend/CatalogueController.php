<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    
    public function index() {
        return view('frontend.catalogue.index');
    }
    
    public function product() {
        return view('frontend.catalogue.product');
    }
    
    public function success() {
        return view('frontend.catalogue.success');
    }
    
}
