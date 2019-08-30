<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusTrackMedia extends Model
{
    protected $table = 'bonus_track_media';

    /**
     * Get the category that owns the bonus track media.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

}
