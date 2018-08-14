<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\ResultsCategories;

class ResultsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results_categories = ResultsCategories::all();
        return view('backend.results_categories.index', [
            'results_categories' => $results_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.results_categories.create');
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
            $imagen_results_category = $request->file('imagen_results_category');
            
            $results_category = new ResultsCategories;
            $results_category->name = $request->get('name_results_category');
            $results_category->image = $imagen_results_category->getClientOriginalName();
            $results_category->description = $request->get('description_results_category');
            $results_category->active = $request->get('active_results_category');
            $results_category->save();
     
            if($request->hasFile('imagen_results_category')){
                Storage::disk('public')->put('results_categories/'.$results_category->id.'/'.$imagen_results_category->getClientOriginalName(), file_get_contents($imagen_results_category->getRealPath()));
            }

            $message = "Categoria de Resultados: ".$request->get('name_results_category')." creada con exito!";
            
            return redirect('/admin/results_categories')->with('message', $message);
        
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
        return view('backend.results_categories.edit', [
            'results_category' => ResultsCategories::find($id)
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
            
            if($request->hasFile('imagen_results_category')){
                Storage::delete('public/results_categories/'.$id.'/'.$request->get('imagen_results_category_old'));
                
                $imagen_results_category = $request->file('imagen_results_category');
                Storage::disk('public')->put('results_categories/'.$id.'/'.$imagen_results_category->getClientOriginalName(), file_get_contents($imagen_results_category->getRealPath()));

            }
                
            $results_category = ResultsCategories::find($id);
            $results_category->name = $request->get('name_results_category');
            $results_category->image = ($request->hasFile('imagen_results_category') ? $imagen_results_category->getClientOriginalName() : $request->get('imagen_results_category_old'));
            $results_category->description = $request->get('description_results_category');
            $results_category->active = $request->get('active_results_category');
            $results_category->save();
     
            $message = "Categoria de Resultados: ".$request->get('name_results_category')." editada con exito!";
            
            return redirect('/admin/results_categories')->with('message', $message);
        
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
        $results_category = ResultsCategories::find($id);
        $results_category->delete();
     
        Storage::deleteDirectory('public/results_categories/'.$id);
        
        return redirect('/admin/results_categories')->with('message', 'Categoría de Resultados eliminada con exito!');
    }
    
    public function export()
    {
        $timestamp = date('Y_m_d_h_i_s');
        Excel::create('export_results_categories_'.$timestamp, function($excel) {
 
            $excel->sheet('Categorias_de_Resultados', function($sheet) {
                $results_categories = ResultsCategories::all();
                $sheet->fromArray($results_categories);
            });
            
        })->export('xls');
        
    }
}