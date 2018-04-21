<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Regions;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.regions.index', [
            'regions' => Regions::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = new Regions;
        $region->name = $request->get('name_region');
        $region->active = $request->get('active_region');
        $region->save();
        
        return redirect('/admin/regions')->with('message', "Region: ".$request->get('name_region')." creada con exito!");
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
        return view('backend.regions.edit', [
            'region' => Regions::find($id)
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
        $region = Regions::find($id);
        $region->name = $request->get('name_region');
        $region->active = $request->get('active_region');
        $region->save();
        
        return redirect('/admin/regions')->with('message', "Region: ".$request->get('name_region')." editada con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Regions::find($id);
        $region->delete();
        
        return redirect('/admin/regions')->with('message', 'Region eliminada con exito!');
    }
}
