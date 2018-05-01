<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Functions;
use App\SocialNetworks;

class SocialNetworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.social_networks.index', [
            'social_networks' => SocialNetworks::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.social_networks.create');
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
            $logo_social_networks = $request->file('logo_social_networks');
            
            $social_networks = new SocialNetworks;
            $social_networks->name = $request->get('name_social_networks');
            $social_networks->url = $request->get('url_social_networks');
            $social_networks->logo = $logo_social_networks->getClientOriginalName();
            $social_networks->active = $request->get('active_social_networks');
            $social_networks->save();
            
            if($request->hasFile('logo_social_networks')){
                Storage::disk('public')->put('social_networks/'.$social_networks->id.'/'.$logo_social_networks->getClientOriginalName(), true);
            }
     
            $message = "Red Social: ".$request->get('name_social_networks')." creada con exito!";
            
            return redirect('/admin/settings/social_networks')->with('message', $message);
        
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
        return view('backend.social_networks.edit', [
            'social_networks' => SocialNetworks::find($id)
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
            
            if($request->hasFile('logo_social_networks')){
                Storage::delete('public/social_networks/'.$id.'/'.$request->get('logo_social_networks_old'));
                
                $logo_social_networks = $request->file('logo_social_networks');
                Storage::disk('public')->put('social_networks/'.$id.'/'.$logo_social_networks->getClientOriginalName(), true);
            }
                
            $category = SocialNetworks::find($id);
            $category->name = $request->get('name_social_networks');
            $category->url = $request->get('url_social_networks');
            $category->logo = ($request->hasFile('logo_social_networks') ? $logo_social_networks->getClientOriginalName() : $request->get('logo_social_networks_old'));
            $category->active = $request->get('active_social_networks');
            $category->save();
     
            $message = "Red Social: ".$request->get('name_social_networks')." editada con exito!";
            
            return redirect('/admin/settings/social_networks')->with('message', $message);
        
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
        $social_networks = SocialNetworks::find($id);
        $social_networks->delete();
     
        Storage::deleteDirectory('public/social_networks/'.$id);
        
        return redirect('/admin/settings/social_networks')->with('message', 'Red Social eliminada con exito!');
    }
}
