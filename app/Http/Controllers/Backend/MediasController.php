<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\ImageCategory;
use App\Image;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('backend.images.index', [
          'images' => Image::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.images.create', [
        'image_categories' => ImageCategory::where('active', '1')->get()
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

            $image_src = $request->file('image');

            $image = new Image;
            $image->name = $request->get('name');
            $image->description = $request->get('description');
            $image->link = $request->get('link');
            $image->id_category = $request->get('id_category');
            $image->src = $image_src->getClientOriginalName();
            $image->active = $request->get('active');
            $image->save();

            if($request->hasFile('image')){
              Storage::disk('public')->put('galeria_imagenes/'.$image->id.'/'.$image_src->getClientOriginalName(), file_get_contents($image_src->getRealPath()));
            }

            $message = "Imagen, de Galeria de Imagenes: ".$request->get('name')." creada con exito!";

            return redirect('/admin/media_images')->with('message', $message);

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
      return view('backend.images.edit', [
          'image' => Image::find($id),
          'image_categories' => ImageCategory::where('active', '1')->get()
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

            if($request->hasFile('image')){
                Storage::delete('public/galeria_imagenes/'.$id.'/'.$request->get('image_old'));

                $image_src = $request->file('image');
                Storage::disk('public')->put('galeria_imagenes/'.$id.'/'.$image_src->getClientOriginalName(), file_get_contents($image_src->getRealPath()));
            }

            $image = Image::find($id);
            $image->name = $request->get('name');
            $image->description = $request->get('description');
            $image->link = $request->get('link');
            $image->id_category = $request->get('id_category');
            $image->src = ($request->hasFile('image') ? $image_src->getClientOriginalName() : $request->get('image_old'));
            $image->active = $request->get('active');
            $image->save();

            $message = "Imagen, de Galeria de Imagenes: ".$request->get('name')." editada con exito!";
            return redirect('/admin/media_images')->with('message', $message);


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
        $image = Image::find($id);
        $image->delete();

        Storage::deleteDirectory('public/galeria_imagenes/'.$id);

        return redirect('/admin/media_images')->with('message', 'Imagen, de Galeria de Imagenes, eliminada con exito!');
    }
}
