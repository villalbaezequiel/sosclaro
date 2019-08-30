<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Regions extends Model
{
    protected $table = 'regions';

    /**
     * Get the bonusTracks for the region.
     */
    public function bonusTracks()
    {
        return $this->hasMany('App\BonusTrack');
    }

    /**
     * Get the results for the region.
     */
    public function results()
    {
        return $this->hasMany('App\Results');
    }

    static public function getName($id) {
        $name = Regions::find($id);
        if(isset($name)){ 
            return $name->name;
        } else {
            return "No estás asignado a ninguna Región";
        }
    }
    
}
