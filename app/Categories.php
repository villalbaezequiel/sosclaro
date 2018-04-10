<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;

class Categories extends Model
{
    protected $table = 'categories';
    
    static public function countProducts($id_category) {
        $countProducts = Products::where('id_category', $id_category)->count();
        if($countProducts == 0){
            return 'No hay Productos asociados.';
        } else {
            return $countProducts;
        }
    }

}
