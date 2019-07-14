<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\Products;
use App\ProductsHistoryStock;
use App\Categories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index', [
            'products' => Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create', [
            'categories' => Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message;
        try {
            $imagen_product = $request->file('imagen_product');
            
            $product = new Products;
            $product->codigo = $request->get('codigo_product');
            $product->id_category = $request->get('id_category');
            $product->name = $request->get('name_product');
            $product->description = $request->get('description_product');
            $product->politica_legal = $request->get('politica_legal_product');
            $product->image = $imagen_product->getClientOriginalName();
            $product->price = $request->get('price_product');
            $product->stock = $request->get('stock_initial_product');
            $product->notification = $request->get('stock_notification_product');
            $product->voucher = ($request->get('voucher_product') ? 1 : 0);
            $product->active = $request->get('active_product');
            $product->save();
            
            // add stock initial to Product
            $stock_initial_product = new ProductsHistoryStock;
            $stock_initial_product->id_product = $product->id;
            $stock_initial_product->stock = $request->get('stock_initial_product');
            $stock_initial_product->save();
     
            if($request->hasFile('imagen_product')){
                Storage::disk('public')->put('products/'.$product->id.'/'.$imagen_product->getClientOriginalName(), file_get_contents($imagen_product->getRealPath()));
            }

            $message = "Producto: ".$request->get('name_product')." creado con exito!";
            
            return redirect('/admin/products')->with('message', $message);
        
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json($respuesta);
	}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.products.edit', [
            'product' => Products::find($id),
            'categories' => Categories::all(),
            'stocks_initial' => ProductsHistoryStock::getStocksToProduct($id),
            'stocks_total' => ProductsHistoryStock::getStocksTotalToProduct($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message;
        try {
            
            if($request->hasFile('imagen_product')){
                Storage::delete('public/products/'.$id.'/'.$request->get('imagen_product_old'));
                
                $imagen_product = $request->file('imagen_product');
                Storage::disk('public')->put('products/'.$id.'/'.$imagen_product->getClientOriginalName(), file_get_contents($imagen_product->getRealPath()));
            }
                
            $product = Products::find($id);
            $product->codigo = $request->get('codigo_product');
            $product->id_category = $request->get('id_category');
            $product->name = $request->get('name_product');
            $product->description = $request->get('description_product');
            $product->politica_legal = $request->get('politica_legal_product');
            $product->image = ($request->hasFile('imagen_product') ? $imagen_product->getClientOriginalName() : $request->get('imagen_product_old'));
            $product->price = $request->get('price_product');
            $product->stock = (!empty($request->get('stock_initial_product')) ? ($request->get('stock_product')+$request->get('stock_initial_product')) : $request->get('stock_product'));
            $product->notification = $request->get('stock_notification_product');
            $product->voucher = ($request->get('voucher_product') ? 1 : 0);
            $product->active = $request->get('active_product');
            $product->save();
            
            if(!empty($request->get('stock_initial_product'))){
                // add stock initial to Product
                $stock_initial_product = new ProductsHistoryStock;
                $stock_initial_product->id_product = $product->id;
                $stock_initial_product->stock = $request->get('stock_initial_product');
                $stock_initial_product->save();    
            }
            
            $message = "Producto: ".$request->get('name_product')." editado con exito!";
            
            return redirect('/admin/products')->with('message', $message);
        
        } catch(\Exception $e) {

            if(\Config::get('app.debug'))
                    $message = 'ERROR('.$e->getLine().'): '.$e->getMessage();
            else
                    $message = 'Se ha producido un error. Por favor intente nuevamente.';

            $respuesta = array(
                    'estado' => false,
                    'mensaje' => $message
            );

            return \Response::json($respuesta);
	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
     
        Storage::deleteDirectory('public/products/'.$id);
        
        return redirect('/admin/products')->with('message', 'Producto eliminado con exito!');
    }
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('export_products_'.$timestamp, function($excel) {
 
            $excel->sheet('Productos', function($sheet) {
                $products = Products::all();
                $sheet->fromArray($products);
            });
            
        })->export('xls');
        
    }
}
