<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image_Sliders;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Image_Sliders::where('users_id',Auth::user()->id)->paginate(5);
        
        return view('imagenes.index')->with('imagenes',$imagenes);
  
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
         
        $imagene = Image_Sliders::find($id);
        return view('imagenes.edit',compact('imagene'));
  
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
        $imagene = Image_Sliders::find($id);
        $imagene->titulos = $request->input('titulos');
        $imagene->descripcion = $request->input('descripcion');
      //  $imagene->estado = $request->input('estado');
        
        $imagene->save();

        return redirect()->route('imagenes.index')->with('success','Actividad modificada successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = Image_Sliders::find($id);

        Storage::delete($imagen->nombre_foto);
        Image_Sliders::find($id)->delete();
        return redirect()->route('imagenes.index')->with('success','Actividad deleted successfully');

    }
}
