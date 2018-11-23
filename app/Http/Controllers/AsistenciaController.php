<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Cliente;
use App\Persona;
use App\Actividade;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Inscripcione;


class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol == '1'){

            $asistencias = Asistencia::all();
            $clientes = Cliente::all();
        }else{
                $asistencias = Asistencia::where('users_id',Auth::user()->id)->orderBy('asis_fecha','DESC')->get();
                $clientes = Cliente::where('users_id',Auth::user()->id)->get();
        }
        $persona = Persona::with('persona');


        return view('asistencias.index',compact('asistencias','persona'))->with('clientes',$clientes);
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
       
        
        return view('asistencias.create',compact('actividades','cliente','persona'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
        Asistencia::find($id)->delete();
        return redirect()->route('clientes.index')->with('success','Asistencia Eliminada');

    }

    public function asist(){

        $user = User::find(Auth::user()->id);
        $cliente  = Cliente::find($user->user_ayuda);
        
        $inscripciones = Inscripcione::where('cli_id',$cliente->id)->get();

        $cant = $inscripciones->count();
        $band = false;
        $total = 0;
        foreach($inscripciones as $inscripcion){
                if($inscripcion->insc_alta){
                    $band = true;
                    $total++;
                }
        }

        if($band){
            $hoy = Carbon::now();
            $asistencias = Asistencia::where('cli_id',$cliente->id)->OrderBy('asis_fecha', 'DESC')->get();
            
                if ($asistencias->isNotEmpty()){
                    $asis = $asistencias->first(); 
                    $fecha = Carbon::create($asis->asis_fecha);
                    $fecha->addHours(5);
                    
                    $ahora = Carbon::now()->between( $fecha, $hoy);
                }else {
                    $ahora = false;
                }
                    if(!$ahora){    
                
                        $asistencia = new Asistencia;
                        $asistencia->cli_id = $cliente->id;
                        $asistencia->users_id = Auth::user()->id;           
                        $asistencia->asis_fecha = $hoy;
                        $asistencia->save();
                    }
        }
        if($total != 0){
            if($cant == $total){
                return redirect()->route('clientes.index')->with('success','Asistencia cargada');        
            }else {
                return redirect()->route('clientes.index')->with('warning','Asistencia cargada con al menos una actividad vencida');            
            }
        }else {
            return redirect()->route('clientes.index')->with('alert','Asistencia NO cargada con actividad/es vencida/s');            
            
        }
    
    }
}
