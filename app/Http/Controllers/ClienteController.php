<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        $persona = Persona::with('persona');
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
       
            
            $persona = new Persona;
                $persona->pers_nombre = $request->input('pers_nombre'); 
                $persona->pers_apellido = $request->input('pers_apellido');
                $persona->pers_direccion = $request->input('pers_direccion');
                $persona->pers_telefono = $request->input('pers_telefono');
                $persona->save();
            $cliente = new Cliente;
                    $cliente->pers_id = $persona->id;     
                    $cliente->users_id = Auth::user()->id;
                    $cliente->cli_edad = $request->input('cli_edad');
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
        $cliente = Cliente::find($id);

        return view('clientes.show')->with('cliente',$cliente);
    
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
       
            $cliente = Cliente::find($id);
            $persona = Persona::find($cliente->pers_id);
            $persona->pers_nombre = $request->input('persona->pers_nombre'); 
                $persona->pers_apellido = $request->input('pers_apellido');
                $persona->pers_direccion = $request->input('pers_direccion');
                $persona->pers_telefono = $request->input('pers_telefono');
                
                    $cliente->pers_id = $persona->id;     
            
                    $cliente->cli_edad = $request->input('cli_edad');
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
        
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success','Gimnasio deleted successfully');
    }
}
