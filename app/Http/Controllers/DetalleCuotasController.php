<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividade;
use App\User;
use App\Moneda;
use App\Persona;
use App\Cliente;
use App\DetalleCuota;
use Illuminate\Support\Facades\Auth;

class DetalleCuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cuotadetalles = DetalleCuota::where('users_id',Auth::user()->id)->orderBy('det_cuota_inicio','DESC')->get();
        $actividades = Actividade::where('users_id',Auth::user()->id)->get();
        $clientes = Cliente::where('users_id',Auth::user()->id)->get();
        $persona = Persona::with('persona');

        return view('cuotas.index',compact('cuotadetalles','actividades','persona'))->with('clientes',$clientes);
   
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
        $cuotadetalle = DetalleCuota::find($id);
        $actividade = Actividade::find($cuotadetalle->act_id);
        $cliente = Cliente::find($cuotadetalle->cli_id);
        $persona = Persona::with('persona');
        
        return view('cuotas.show',compact('cuotadetalle','actividade','persona'))->with('cliente',$cliente);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        DetalleCuota::find($id)->delete();
        return redirect()->route('cuotas.index')->with('success','Cuota deleted successfully');
   
    }
}
