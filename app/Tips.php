<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tips;

class Tips extends Model
{
    protected $table = 'tips';

    static public function getTips($id_tip_category) {
        $tips = Tips::where('id_category', '=', $id_tip_category)
                    ->where('active', '=', 1)
                    ->get()
                    ->toArray();
        return $tips;
    }
}
