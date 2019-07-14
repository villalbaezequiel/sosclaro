<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ResultsCategories;

class ResultsCategories extends Model
{
    protected $table = 'results_categories';
    
    static public function getNameCategory($id) {
        $category = ResultsCategories::find($id);
        return $category->name;
    }
}
