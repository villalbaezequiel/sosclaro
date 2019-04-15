<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modals;
use Illuminate\Support\Facades\Storage;

class ModalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.modals.index', [
            'modals' => Modals::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modals.create');
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

            $image_desktop = $request->file('image_desktop_modal');
            $image_mobile = $request->file('image_mobile_modal');

            $modal = new Modals;
            $modal->name = $request->get('name_modal');
            $modal->url = $request->get('url_modal');
            $modal->section = $request->get('section_modal');
            $modal->image_desktop = $image_desktop->getClientOriginalName();
            $modal->image_mobile = $image_mobile->getClientOriginalName();
            $modal->active = $request->get('active_modal');
            $modal->save();

            if($request->hasFile('image_desktop_modal')){
                Storage::disk('public')->put('modals/desktop/'.$modal->id.'/'.$image_desktop->getClientOriginalName(), file_get_contents($image_desktop->getRealPath()));
            }

            if($request->hasFile('image_mobile_modal')){
                Storage::disk('public')->put('modals/mobile/'.$modal->id.'/'.$image_mobile->getClientOriginalName(), file_get_contents($image_mobile->getRealPath()));
            }

            $message = "Modals: ".$request->get('name_modal')." creado con exito!";

            return redirect('/admin/modals')->with('message', $message);

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
        return view('backend.modals.edit', [
            'modal' => Modals::find($id)
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

            if($request->hasFile('image_desktop_modal')){
                Storage::delete('public/modals/desktop/'.$id.'/'.$request->get('image_desktop_modal_old'));

                $image_desktop_modal = $request->file('image_desktop_modal');
                Storage::disk('public')->put('modals/desktop/'.$id.'/'.$image_desktop_modal->getClientOriginalName(), file_get_contents($image_desktop_modal->getRealPath()));
            }

            if($request->hasFile('image_mobile_modal')){
                Storage::delete('public/modals/mobile/'.$id.'/'.$request->get('image_mobile_modal_old'));

                $image_mobile_modal = $request->file('image_mobile_modal');
                Storage::disk('public')->put('modals/mobile/'.$id.'/'.$image_mobile_modal->getClientOriginalName(), file_get_contents($image_mobile_modal->getRealPath()));
            }

            $modal = Modals::find($id);
            $modal->name = $request->get('name_modal');
            $modal->url = $request->get('url_modal');
            $modal->section = $request->get('section_modal');
            $modal->image_desktop = ($request->hasFile('image_desktop_modal') ? $image_desktop_modal->getClientOriginalName() : $request->get('image_desktop_modal_old'));
            $modal->image_mobile = ($request->hasFile('image_mobile_modal') ? $image_mobile_modal->getClientOriginalName() : $request->get('image_mobile_modal_old'));
            $modal->active = $request->get('active_modal');
            $modal->save();

            $message = "Modals: ".$request->get('name_modal')." editado con exito!";

            return redirect('/admin/modals')->with('message', $message);

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
        $modal = Modals::find($id);
        $modal->delete();

        Storage::deleteDirectory('public/modals/desktop/'.$id);
        Storage::deleteDirectory('public/modals/mobile/'.$id);

        return redirect('/admin/modals')->with('message', 'Modal eliminado con exito!');
    }
}
