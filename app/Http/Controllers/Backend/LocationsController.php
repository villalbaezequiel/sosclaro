<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Functions;
use App\Regions;
use App\Provinces;
use App\Cities;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.locations.index', [
            'cities' => Cities::all()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.locations.create', [
            'provinces' => Provinces::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new Cities;
        $city->id_province = $request->get('province_city');
        $city->name = $request->get('name_city');
        $city->active = $request->get('active_city');
        $city->save();
        
        return redirect('/admin/locations')->with('message', "Ciudad: ".$request->get('name_city')." creado con exito!");
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
        return view('backend.locations.edit', [
            'city' => Cities::find($id),
            'provinces' => Provinces::all()
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
        $city = Cities::find($id);
        $city->id_province = $request->get('province_city');
        $city->name = $request->get('name_city');
        $city->active = $request->get('active_city');
        $city->save();
        
        return redirect('/admin/locations')->with('message', "Ciudad: ".$request->get('name_city')." editada con exito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Cities::find($id);
        $city->delete();
        
        return redirect('/admin/locations')->with('message', 'Ciudad eliminada con exito!');
    }
    
    public function getRegions()
    {
        return response()->json(['regions' => Regions::all()]);
    }
    
    public function getProvinces($id_region)
    {
        return response()->json( ['provinces' => Provinces::where('id_region',$id_region )->get() ]);
    }
    
    public function getCities($id_province)
    {
        return response()->json( ['cities' => Cities::where('id_province',$id_province )->get() ]);
    }
}
