<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Support\Excel;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\BonusTrackCategories;

class BonusTrackCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus_track_categories = BonusTrackCategories::all();
        return view('backend.bonus_track_categories.index', [
            'bonus_track_categories' => $bonus_track_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bonus_track_categories.create');
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
            $imagen_bonus_track_category = $request->file('imagen_bonus_track_category');
            
            $bonus_track_category = new BonusTrackCategories;
            $bonus_track_category->name = $request->get('name_bonus_track_category');
            $bonus_track_category->image = $imagen_bonus_track_category->getClientOriginalName();
            $bonus_track_category->description = $request->get('description_bonus_track_category');
            $bonus_track_category->active = $request->get('active_bonus_track_category');
            $bonus_track_category->save();
     
            if($request->hasFile('imagen_bonus_track_category')){
                Storage::disk('public')->put('bonus_track_categories/'.$bonus_track_category->id.'/'.$imagen_bonus_track_category->getClientOriginalName(), file_get_contents($imagen_bonus_track_category->getRealPath()));
            }

            $message = "Categoria de Resultados/Bonus Track: ".$request->get('name_bonus_track_category')." creada con exito!";
            
            return redirect('/admin/bonus_track_categories')->with('message', $message);
        
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
        return view('backend.bonus_track_categories.edit', [
            'bonus_track_category' => BonusTrackCategories::find($id)
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
            
            if($request->hasFile('imagen_bonus_track_category')){
                Storage::delete('public/bonus_track_categories/'.$id.'/'.$request->get('imagen_bonus_track_category_old'));
                
                $imagen_bonus_track_category = $request->file('imagen_bonus_track_category');
                Storage::disk('public')->put('bonus_track_categories/'.$id.'/'.$imagen_bonus_track_category->getClientOriginalName(), file_get_contents($imagen_bonus_track_category->getRealPath()));

            }
                
            $bonus_track_category = BonusTrackCategories::find($id);
            $bonus_track_category->name = $request->get('name_bonus_track_category');
            $bonus_track_category->image = ($request->hasFile('imagen_bonus_track_category') ? $imagen_bonus_track_category->getClientOriginalName() : $request->get('imagen_bonus_track_category_old'));
            $bonus_track_category->description = $request->get('description_bonus_track_category');
            $bonus_track_category->active = $request->get('active_bonus_track_category');
            $bonus_track_category->save();
     
            $message = "Categoria de Resultados/Bonus Track: ".$request->get('name_bonus_track_category')." editada con exito!";
            
            return redirect('/admin/bonus_track_categories')->with('message', $message);
        
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
        $bonus_track_category = BonusTrackCategories::find($id);
        $bonus_track_category->delete();
     
        Storage::deleteDirectory('public/bonus_track_categories/'.$id);
        
        return redirect('/admin/bonus_track_categories')->with('message', 'Categoría de Resultados/Bonus Track eliminada con exito!');
    }
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('export_bonus_track_categories_'.$timestamp, function($excel) {
 
            $excel->sheet('Categorias_de_Resultados', function($sheet) {
                $bonus_track_categories = BonusTrackCategories::all();
                $sheet->fromArray($bonus_track_categories);
            });
            
        })->export('xls');
        
    }
}