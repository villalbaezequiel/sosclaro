<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tips;

class TipsCategories extends Model
{
    protected $table = 'tips_categories';

    static public function countTips($id_category) {
        $countTips = Tips::where('id_category', $id_category)->count();
        if($countTips == 0){
            return 'No hay Entradas asociados.';
        } else {
            return $countTips;
        }
    }
    
    static public function getNameCategory($id) {
        $category = TipsCategories::find($id);
        return $category->name;
    }
}
