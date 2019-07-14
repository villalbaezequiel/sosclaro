<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\ImageCategory;

class MediaCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $image_categories = ImageCategory::all();
      return view('backend.image_categories.index', [
          'image_categories' => $image_categories
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.image_categories.create');
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

            $category = new ImageCategory;
            $category->name = $request->get('name');
            $category->description = $request->get('description');
            $category->active = $request->get('active');
            $category->save();

            $message = "Categoria, de Galería de Imágenes: ".$request->get('name')." creada con exito!";

            return redirect('/admin/media_images_categorias')->with('message', $message);

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
      return view('backend.image_categories.edit', [
          'image_category' => ImageCategory::find($id)
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

            $category = ImageCategory::find($id);
            $category->name = $request->get('name');
            $category->description = $request->get('description');
            $category->active = $request->get('active');
            $category->save();

            $message = "Categoria, de Galería de Imágenes ".$request->get('name')." editada con exito!";

            return redirect('/admin/media_images_categorias')->with('message', $message);

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
      $category = ImageCategory::find($id);
      $category->delete();

      return redirect('/admin/media_images_categorias')->with('message', 'Categoría, de Galería de Imágenes eliminada con exito!');
    }
}
