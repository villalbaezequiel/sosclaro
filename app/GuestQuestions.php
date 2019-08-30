<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestQuestions extends Model
{
    protected $table = "guest_questions";

    /**
     * Get the guest that owns the guest question.
     */
    public function guest()
    {
        return $this->belongsTo('App\Guest');
    }
}
