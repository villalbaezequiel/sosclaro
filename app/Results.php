<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table = 'results';

    /**
     * Get the category that owns the result.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    /**
     * Get the user that owns the result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the regions that owns the result.
     */
    public function region()
    {
        return $this->belongsTo('App\Regions');
    }
}
