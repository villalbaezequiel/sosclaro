<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusTrack extends Model
{
    protected $table = 'bonus_track';

    /**
     * Get the user that owns the bonus track.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that owns the bonus track.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    /**
     * Get the region that owns the bonus track.
     */
    public function region()
    {
        return $this->belongsTo('App\Regions');
    }
}
