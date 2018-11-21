<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructore;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $instructores = Instructore::where('users_id',Auth::user()->id)->paginate(5);
        $persona = Persona::with('persona');
        return view('instructores.index',compact('persona'))->with('instructores',$instructores);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instructores.create');
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
            $persona->pers_dni = $request->input('pers_dni'); 
            $persona->pers_nombre = $request->input('pers_nombre'); 
            $persona->pers_apellido = $request->input('pers_apellido');
            $persona->pers_direccion = $request->input('pers_direccion');
            $persona->pers_telefono = $request->input('pers_telefono');
            $persona->pers_email = $request->input('pers_email');
            $persona->save();
        $instructor = new Instructore;
                $instructor->pers_id = $persona->id;     
                $instructor->users_id = Auth::user()->id;
                $instructor->save();
        return redirect()->route('instructores.index')->with('success','Instructo created successfully');
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
        $instructor = Instructore::find($id);
        return view('instructores.show',compact('instructor'));
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
        $instructor = Instructore::find($id);
        return view('instructores.edit',compact('instructor'));
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
            $instructor = Instructore::find($id);
            $persona = Persona::find($instructor->pers_id);

            $persona->pers_dni = $request->input('pers_dni'); 
            $persona->pers_nombre = $request->input('pers_nombre'); 
            $persona->pers_apellido = $request->input('pers_apellido');
            $persona->pers_direccion = $request->input('pers_direccion');
            $persona->pers_telefono = $request->input('pers_telefono');
            $persona->pers_email = $request->input('pers_email');
          
                $instructor->pers_id = $persona->id;     
        
                $instructor->save();
                $persona->save();

        return redirect()->route('instructores.index')->with('success','Instructor edited successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Instructore::find($id)->delete();
        return redirect()->route('instructores.index')->with('success','Instructor deleted successfully');
    }
}
   