<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Products;

class CatalogueController extends Controller
{
    
    public function index() {
        return view('frontend.catalogue.index', [
            'products' => Products::where('active', '=', 1)->get()
        ]);
    }
    
    public function product($id) {
        return view('frontend.catalogue.product', [
            'product' => Products::find($id)
        ]);
    }
    
    public function success() {
        return view('frontend.catalogue.success');
    }
    
}
