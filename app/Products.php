<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    protected $table = 'products';

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    /**
     * Get the exchanges for the products.
     */
    public function exchanges()
    {
        return $this->hasMany('App\Exchanges');
    }

    /**
     * Get the exchanges for the products.
     */
    public function productsHistoryStock()
    {
        return $this->hasMany('App\ProductsHistoryStock');
    }
    
    static public function getName($id) {
        $product = Products::where('id', '=', $id)->get();
        if(!empty($product[0])){
            return $product[0]->name;
        }
    }
    
    static public function getCodigo($id) {
        $product = Products::where('id', '=', $id)->get();
        if(!empty($product[0])){
            return $product[0]->codigo;
        }
    }
    
    static public function getValuePuntos($id) {
        $product = Products::where('id', '=', $id)->get();
        if(!empty($product[0])){
            return $product[0]->price;
        }
    }
    
    static public function getValuePuntosByCode($code) {
        $product = Products::where('codigo', '=', $code)->get();
        if(!empty($product[0])){
            return $product[0]->price;
        }
    }

    static public function getUrlImage($id) {
        $product = Products::where('id', '=', $id)->get();
        if(!empty($product[0])){
            return 'storage/app/public/products/'.$product[0]->id.'/'.$product[0]->image;
        }
    }
}
