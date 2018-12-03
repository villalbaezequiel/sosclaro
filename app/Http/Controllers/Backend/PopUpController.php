<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PopUp;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\ResultsCategories;
use App\BonusTrackCategories;

class PopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.popup.index', [
            'popup' => PopUp::all(),
            'result_categories' => ResultsCategories::all(),
            'bonus_track_categories' => BonusTrackCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.popup.create', [
            'result_categories' => ResultsCategories::all(),
            'bonus_track_categories' => BonusTrackCategories::all(),
            'months' => Functions::getMonths()
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
            
            $image = $request->file('image_popup');
     
            $popup = new PopUp;
            $popup->name = $request->get('name_popup');
            $popup->url = $request->get('url_popup');
            $popup->id_category = $request->get('id_category_popup');
            $popup->month = $request->get('month_popup');
            $popup->image = $image->getClientOriginalName();
            $popup->active = $request->get('active_popup');
            $popup->save();
            
            if($request->hasFile('image')){
                Storage::disk('public')->put('popup/'.$popup->id.'/'.$image->getClientOriginalName(), file_get_contents($image->getRealPath()));
            }
            
            $message = "PopUp: ".$request->get('name_popup')." creado con exito!";
            
            return redirect('/admin/popup')->with('message', $message);
        
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
        return view('backend.popup.edit', [
            'popup' => PopUp::find($id),
            'result_categories' => ResultsCategories::all(),
            'bonus_track_categories' => BonusTrackCategories::all(),
            'months' => Functions::getMonths()
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
            
            if($request->hasFile('image_popup')){
                Storage::delete('public/popup/'.$id.'/'.$request->get('image_popup_old'));
                
                $image_popup = $request->file('image_popup');
                Storage::disk('public')->put('popup/'.$id.'/'.$image_popup->getClientOriginalName(), file_get_contents($image_popup->getRealPath()));
            }     
            
            $popup = PopUp::find($id);
            $popup->name = $request->get('name_popup');
            $popup->url = $request->get('url_popup');
            $popup->id_category = $request->get('id_category_popup');
            $popup->month = $request->get('month_popup');
            $popup->image = ($request->hasFile('image_popup') ? $image_popup->getClientOriginalName() : $request->get('image_popup_old'));
            $popup->active = $request->get('active_popup');
            $popup->save();
            
            $message = "PopUp: ".$request->get('name_popup')." editado con exito!";
            
            return redirect('/admin/popup')->with('message', $message);
        
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
        $popup = PopUp::find($id);
        $popup->delete();
        
        Storage::deleteDirectory('public/popup/'.$id);

        return redirect('/admin/popup')->with('message', 'PopUp eliminado con exito!');
    }
}
