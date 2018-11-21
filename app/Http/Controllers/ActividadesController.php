<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividade;
use App\User;
use App\Moneda;
use Illuminate\Support\Facades\Auth;

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
        $rules = [
            
            'act_cuota' => 'required|numeric|min:2|max:100000',
            
        ];
     
        $this->validate($request, $rules);

        $actividad = new Actividade; 
        $actividad->users_id = Auth::user()->id;
        $actividad->act_nombre = $request->input('act_nombre');
        $actividad->monedas_id = $request->get('moneda');
        
        $actividad->act_cuota = $request->input('act_cuota');
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
        request()->validate([
            'act_nombre' => 'required|max:20',
            'act_cuota' => 'required|numeric|min:2|max:100000',
            'moneda' => 'required|max:20',
        ]);

        $actividad = Actividade::find($id);
        $actividad->act_nombre = $request->input('act_nombre');
        $actividad->monedas_id = $request->get('moneda');
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
