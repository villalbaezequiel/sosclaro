<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductsHistoryStock;

class ProductsHistoryStock extends Model
{
    protected $table = "products_history_stock";

    static public function getStocksToProduct($id_product)
    {
        $stocksHistoryProduct = ProductsHistoryStock::where('id_product', '=', $id_product)->orderBy('id', 'desc')->get();
        if(!empty($stocksHistoryProduct[0])){
            return $stocksHistoryProduct;
        }
    }
    
    static public function getStocksTotalToProduct($id_product)
    {
        $stocksHistoryProduct = ProductsHistoryStock::where('id_product', '=', $id_product)->orderBy('id', 'desc')->get();
        if(!empty($stocksHistoryProduct[0])){
            $total = 0;
            foreach ($stocksHistoryProduct as $value) {
                $total += $value->stock;
            }
            return $total;
        }
    }

}
