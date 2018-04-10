<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('backend.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            $imagen_category = $request->file('imagen_category');
            
            $category = new Categories;
            $category->name = $request->get('name_category');
            $category->image = $imagen_category->getClientOriginalName();
            $category->description = $request->get('description_category');
            $category->active = $request->get('active_category');
            $category->save();
     
            if($request->hasFile('imagen_category')){
                Storage::disk('public')->put('categories/'.$category->id.'/'.$imagen_category->getClientOriginalName(), true);
            }

            $message = "Categoria: ".$request->get('name_category')." creada con exito!";
            
            return redirect('/admin/categories')->with('message', $message);
        
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
        return view('backend.categories.edit', [
            'category' => Categories::find($id)
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
            
            if($request->hasFile('imagen_category')){
                Storage::delete('public/categories/'.$id.'/'.$request->get('imagen_category_old'));
                
                $imagen_category = $request->file('imagen_category');
                Storage::disk('public')->put('categories/'.$id.'/'.$imagen_category->getClientOriginalName(), true);
            }
                
            $category = Categories::find($id);
            $category->name = $request->get('name_category');
            $category->image = ($request->hasFile('imagen_category') ? $imagen_category->getClientOriginalName() : $request->get('imagen_category_old'));
            $category->description = $request->get('description_category');
            $category->active = $request->get('active_category');
            $category->save();
     
            $message = "Categoria: ".$request->get('name_category')." editada con exito!";
            
            return redirect('/admin/categories')->with('message', $message);
        
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
        $category = Categories::find($id);
        $category->delete();
     
        Storage::deleteDirectory('public/categories/'.$id);
        
        return redirect('/admin/categories')->with('message', 'Categoría eliminada con exito!');
    }
}
