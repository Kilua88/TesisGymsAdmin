<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Persona;
use App\User;
use App\Actividade;
use App\Moneda;
use App\DetalleCuota;
use App\Inscripcione;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hoy = Carbon::now();
        $clientes = Cliente::where('users_id',Auth::user()->id)->paginate(5);
        $actividades = Actividade::where('users_id',Auth::user()->id)->get();
        $persona = Persona::with('persona');
        
        
        // para cada cliente
        foreach ($clientes as $cliente){

                $inscripciones = Inscripcione::where('cli_id',$cliente->id)->get();
        

                foreach( $inscripciones as $inscripcion){

                    if($inscripcion->insc_alta){
                        $estado = $hoy->greaterThan($inscripcion->insc_finaliza);
                        if ($estado){
                            $inscripcion->insc_estado = false;
                            $inscripcion->save();
                        }else{
                            $inscripcion->insc_estado = true;
                            $inscripcion->save();
                        }
                    }
                    
                }      
        
        
        }
       
            
        
        foreach ($clientes as $cliente){            
                
                $inscripciones = Inscripcione::where('cli_id',$cliente->id)->where('insc_alta',true)->get();
                
                if ($inscripciones->isNotEmpty()) {
                    
                    $cantidad = $inscripciones->count();
                
                        $count=0;
                        foreach( $inscripciones as $inscripcion){
                                if ($inscripcion->insc_estado){
                                    $count++;
                                }
                        }
                       
                        if($count == 0){
                            $cliente->cli_activo = 'inactivo';
                        }else {                            
                            if($cantidad == $count){
                                $cliente->cli_activo = 'activo';
                            }else {
                                $cliente->cli_activo = 'warning';
                            }
                        }    
                            
                         
                        
                }else {

                    $cliente->cli_activo = 'inactivo';
                }
                $cliente->save();
                    
            }

            
        return view('clientes.index',compact('persona'))->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'pers_nombre' => 'required|max:20',
            'pers_apellido' => 'required|max:20',
            'pers_direccion' => 'required|max:20',
            'pers_telefono' => 'required|numeric|min:100000',
            'pers_email' => 'required|email',
            'act_nombre' => 'required|max:20',
            'pers_dni' => 'required|numeric|min:100000',
            'cli_contact_nombre' => 'required|max:20',
            'cli_contact_apellido' => 'required|max:20',
            'cli_contact_telefono' => 'required|numeric|min:100000',
        ];



        $this->validate($request, $rules);

            $persona = new Persona;
                    $persona->pers_dni = $request->input('pers_dni'); 
                    $persona->pers_nombre = $request->input('pers_nombre'); 
                    $persona->pers_apellido = $request->input('pers_apellido');
                    $persona->pers_direccion = $request->input('pers_direccion');
                    $persona->pers_telefono = $request->input('pers_telefono');
                    $persona->pers_email = $request->input('pers_email');
                    $persona->save();
            $cliente = new Cliente;
                    $cliente->pers_id = $persona->id;     
                    $cliente->users_id = Auth::user()->id;
                    $cliente->cli_contact_nombre = $request->input('cli_contact_nombre');
                    $cliente->cli_contact_apellido = $request->input('cli_contact_apellido');
                    $cliente->cli_contact_telefono = $request->input('cli_contact_telefono');
                    $cliente->save();
                    
             return redirect()->route('clientes.index')->with('success','Cliente created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $user = User::find(Auth::user()->id);
        $cliente = Cliente::find($id);
        $user->user_ayuda = $cliente->id;
        $user->save();
        $actividades = Actividade::where('users_id',Auth::user()->id)
                                    ->get();
        $persona = Persona::with('persona');
         
        $inscripciones = Inscripcione::where('cli_id',$cliente->id)->where('insc_alta',true)->get();
         
        if ($inscripciones->isNotEmpty()) {
                    
            $cantidad = $inscripciones->count();
        
                $count=0;
                foreach( $inscripciones as $inscripcion){
                        if ($inscripcion->insc_estado){
                            $count++;
                        }
                }
                if($count == 0){
                    $cliente->cli_activo = 'inactivo';
                }else {                            
                    if($cantidad == $count){
                        $cliente->cli_activo = 'activo';
                    }else {
                        $cliente->cli_activo = 'warning';
                    }
                }    
                    
                 
                
        }else {

            $cliente->cli_activo = 'inactivo';
        }
        $cliente->save();
        
        return view('clientes.show',compact('inscripciones','actividades','persona'))
                ->with('cliente',$cliente);

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit',compact('cliente'));
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
            'pers_nombre' => 'required|max:20',
            'pers_apellido' => 'required|max:20',
            'pers_direccion' => 'required|max:20',
            'pers_telefono' => 'required|numeric|min:100000',
            'pers_email' => 'required|email',
            'act_nombre' => 'required|max:20',
            'pers_dni' => 'required|numeric|min:100000',
            'cli_contact_nombre' => 'required|max:20',
            'cli_contact_apellido' => 'required|max:20',
            'cli_contact_telefono' => 'required|numeric|min:100000',
        ]);



        
            $cliente = Cliente::find($id);
            $persona = Persona::find($cliente->pers_id);
                    $persona->pers_dni = $request->input('pers_dni'); 
                    $persona->pers_nombre = $request->input('pers_nombre'); 
                    $persona->pers_apellido = $request->input('pers_apellido');
                    $persona->pers_direccion = $request->input('pers_direccion');
                    $persona->pers_telefono = $request->input('pers_telefono');
                    $persona->pers_email = $request->input('pers_email');
                
                    $cliente->pers_id = $persona->id;     
                    $cliente->cli_contact_nombre = $request->input('cli_contact_nombre');
                    $cliente->cli_contact_apellido = $request->input('cli_contact_apellido');
                    $cliente->cli_contact_telefono = $request->input('cli_contact_telefono');
                   
                    $cliente->save();
                    $persona->save();

            return redirect()->route('clientes.index')->with('success','Cliente created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Cliente::find($id)->delete();
        return redirect()->route('clientes.index')->with('success','Cliente deleted successfully');
    }
}
