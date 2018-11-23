<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividade;
use App\User;
use App\Moneda;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $actividades = Actividade::where('users_id',Auth::user()->id)->paginate(5);
        $monedas = Moneda::all();
        return view('actividades.index',compact('monedas'))->with('actividades',$actividades);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monedas = Moneda::all();
        return view('actividades.create',compact('monedas'));
  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        $actividad = new Actividade; 
        $actividad->users_id = Auth::user()->id; 
        $actividad->act_nombre = $request->input('act_nombre');
        $actividad->monedas_id = $request->get('moneda');
        $actividad->act_cuota = $request->input('act_cuota');
        $ruta = public_path();

        // recogida del form
        $imagenOriginal = $request->file('file');
        $nombre =  $imagenOriginal->getClientOriginalName();

        // crear instancia de imagen
       // $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $actividad->act_nombre. '.' . $imagenOriginal->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
        
        $path = Storage::putFileAs(Auth::user()->id,  $imagenOriginal, Auth::user()->id.'_'.$temp_name);
        
        $actividad->act_url = 'app/'.$path ;
        $actividad->save();

        
        return redirect()->route('actividades.index')->with('success','Actividad created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividade::find($id);
        $moneda = Moneda::find($actividad->monedas_id);
        return view('actividades.show',compact('moneda'))->with('actividad',$actividad);
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividade::find($id);
        $monedas = Moneda::all();
        return view('actividades.edit',compact('monedas'))->with('actividad',$actividad);
  
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
        $actividad = Actividade::find($id);
        $ruta = public_path();

        // recogida del form
        $imagenOriginal = $request->file('file');
        $nombre =  $imagenOriginal->getClientOriginalName();

        // crear instancia de imagen
       // $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $actividad->act_nombre. '.' . $imagenOriginal->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
        
        $path = Storage::putFileAs(Auth::user()->id,  $imagenOriginal, Auth::user()->id.'_'.$temp_name);
        
        $actividad->act_nombre = $request->input('act_nombre');
        $actividad->monedas_id = $request->get('moneda');
        $actividad->act_url = 'app/'.$path ;
        $actividad->act_cuota = $request->input('act_cuota');
        $actividad->save();

        return redirect()->route('actividades.index')->with('success','Actividad modificada successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        Actividade::find($id)->delete();
        return redirect()->route('actividades.index')->with('success','Actividad deleted successfully');

    }
}
