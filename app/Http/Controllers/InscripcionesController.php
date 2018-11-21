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
use App\Inscripcione;
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
        $actividades = Actividade::where('users_id',Auth::user()->id)->paginate(5);
        $clientes = Cliente::find($id);
        $persona = Persona::with('persona');
        $inscripciones = Inscripcione::where('cli_id',$clientes->id)->where('insc_alta', true)->get();
        
        return view('cuotas.index',compact('inscripciones','actividades','persona'))->with('clientes',$clientes);
   
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
     *debo ver que la inscripcion no exista y crearla,
     *si la inscripcion existe debo agrregar a la ultima 
     *cuota el timepo requeridos
     */


    public function store(Request $request)
    {
       


        $user = User::find(Auth::user()->id);
        $cliente  = Cliente::find($user->user_ayuda);
    
        $inscripciones = Inscripcione::where('cli_id',$cliente->id)->get();

        $acti = $request->get('actividad');
      
        
        $Meses= $request->get('meses');
        $band = false;
        
        foreach($inscripciones as $inscripcion){

            $actividad = Actividade::find($inscripcion->act_id);
            if($acti == $actividad->id){
                $band = true;
                if($inscripcion->insc_alta){
                    $vence = Carbon::create($inscripcion->insc_finaliza);
                    $inscripcion->insc_finaliza = $vence->addMonth($Meses);
                }else{
                    $vence = Carbon::now();
                    $inscripcion->insc_finaliza = $vence->addMonth($Meses);
                    $inscripcion->insc_alta = true;
                }
                $inscripcion->save();
            }
        }

        if(!$band){
            $inscripcion = new Inscripcione;
            $inscripcion->cli_id = $cliente->id;
            $inscripcion->act_id =$acti;           
            $vence = Carbon::now();
            $inscripcion->insc_finaliza = $vence->addMonth($Meses);
            $inscripcion->insc_alta = true;
            $inscripcion->save();
        }

      
        
        $cuotadetalles = new DetalleCuota;

        $cuotadetalles->users_id  = Auth::user()->id;
        $cuotadetalles->cli_id = $cliente->id;
        $cuotadetalles->act_id = $request->get('actividad');

        $actividad = Actividade::find($cuotadetalles->act_id);
        $moneda = Moneda::find($actividad->monedas_id);

        $cuotadetalles->moneda = $moneda->tipo_moneda; 
        $cuotadetalles->valor =  $actividad->act_cuota * $Meses; 
        
        $hoy = Carbon::now();
        
        $cuotadetalles->det_cuota_inicio  = $hoy; 
       
        
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
        $inscripcion=Inscripcione::find($id);
        $inscripcion->insc_alta = false;
        $inscripcion->save();
        return redirect()->route('clientes.index')->with('success','actividad created successfully');

    }
}
