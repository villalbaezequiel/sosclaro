<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipsCategories;
use App\Tips;

class TipsController extends Controller
{
    public function index() {
        return view('frontend.tips.index', [
            'tips_categories' => TipsCategories::where('active', '=', 1)->get()->toArray()
        ]);
    }
    
    public function show($id) {
        return view('frontend.tips.show', [
            'tip' => Tips::find($id)
        ]);
    }
}
