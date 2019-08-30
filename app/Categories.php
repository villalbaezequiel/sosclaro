<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;


class Categories extends Model
{
    protected $table = 'categories';

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Products');
    }

    /**
     * Get the bonusTracks for the category.
     */
    public function bonusTracks()
    {
        return $this->hasMany('App\BonusTrack');
    }

    /**
     * Get the bonusTracksMediafor the category.
     */
    public function bonusTrackMedia()
    {
        return $this->hasMany('App\BonusTrackMedia');
    }

    /**
     * Get the images for the category.
     */
    public function images()
    {
        return $this->hasMany('App\Images');
    }

    /**
     * Get the results for the category.
     */
    public function results()
    {
        return $this->hasMany('App\Results');
    }

    /**
     * Get the results for the category.
     */
    public function resultsMedia()
    {
        return $this->hasMany('App\ResultsMedia');
    }


    /**
     * Get the results for the category.
     */
    public function tips()
    {
        return $this->hasMany('App\Tips');
    }


    static public function countProducts($id_category) {
        $countProducts = Products::where('id_category', $id_category)->count();
        if($countProducts == 0){
            return 'No hay Productos asociados.';
        } else {
            return $countProducts;
        }
    }
    
    static public function getNameCategory($id) {
        $category = Categories::find($id);
        return $category->name;
    }

}
