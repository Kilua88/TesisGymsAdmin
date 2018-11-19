<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Actividade;
use App\User;
use App\Moneda;
use App\Persona;
use App\Cliente;
use Carbon\Carbon;
use App\DetalleCuota;
use Illuminate\Support\Facades\Auth;

class InscripcionesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $actividades = Actividade::where('users_id',Auth::user()->id)->get();
        $clientes = Cliente::find($id);
        $persona = Persona::with('persona');
        $cuotadetalles = DetalleCuota::where('cli_id',$id)->orderBy('det_cuota_fin','DESC')->get();

        return view('cuotas.index',compact('cuotadetalles','actividades','persona'))->with('clientes',$clientes);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {

        $user = User::find(Auth::user()->id);
        $cliente  = Cliente::find($user->user_ayuda);
        $persona = Persona::with('persona');
        $actividades = Actividade::where('users_id',Auth::user()->id)->get();
        $monedas = Moneda::all();
      
        
        return view('inscripciones.create',compact('actividades','monedas','cliente','persona'));

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $user = User::find(Auth::user()->id);
        $cliente  = Cliente::find($user->user_ayuda);

        $cuotas = DetalleCuota::where('cli_id',$cliente->id)->orderBy('det_cuota_fin','DESC')->get();
      
        if ($cuotas->isNotEmpty()){        
            $vence = Carbon::new($cuotas[$i]->det_cuota_fin);
        }else {
            $vence = Carbon::now();
        }


        $cuotadetalles = new DetalleCuota;

        $cuotadetalles->users_id  = Auth::user()->id;
        $cuotadetalles->cli_id = $cliente->id;
        $cuotadetalles->act_id = $request->get('actividad');
        
        $actividad = Actividade::find($cuotadetalles->act_id);
      
        $moneda = Moneda::find($actividad->monedas_id);

        $cuotadetalles->moneda = $moneda->tipo_moneda; 
        $cuotadetalles->valor =  $actividad->act_cuota; 
        
        $hoy = Carbon::now();
       
        
        $Meses= $request->get('meses');

        $cuotadetalles->det_cuota_inicio  = $hoy; 
        $cuotadetalles->det_cuota_fin  = $vence->addMonth($Meses); 
        
        $cuotadetalles->save();
        
        return redirect()->route('clientes.show',$cliente->id)->with('success','actividad created successfully');

        
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
        return redirect()->route('clientes.index')->with('success','actividad created successfully');

    }
}
