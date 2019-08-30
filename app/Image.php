<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Get the category that owns the image.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }
}
