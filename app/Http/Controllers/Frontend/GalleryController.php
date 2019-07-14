<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImageCategory;
use App\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('frontend.gallery', [
        'images' => Image::where('active', '1')->get(),
        'categories' => ImageCategory::where('active', '1')->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getImagesByCategory($id_category)
    {
      try {
        $imagesByCategory = Image::where('id_category', $id_category)
                                ->where('active', '1')
                                ->get();

        return response()->json(['images' => $imagesByCategory, 'id_category' => $id_category]);

      } catch (\Exception $e) {
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
}
