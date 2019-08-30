<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tips extends Model
{
    protected $table = 'tips';

    /**
     * Get the category that owns the tip.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    static public function getTips($id_tip_category) {
        $tips = Tips::where('id_category', '=', $id_tip_category)
                    ->where('active', '=', 1)
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray();
        return $tips;
    }
}
