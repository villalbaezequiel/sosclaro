<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusTrackCategories extends Model
{
    protected $table = 'bonus_track_categories';
    
    static public function getNameCategory($id) {
        $category = BonusTrackCategories::find($id);
        return $category->name;
    }
}
