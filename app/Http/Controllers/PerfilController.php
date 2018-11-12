<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Gimnasio;
use App\Menu;
use Illuminate\Support\Facades\Auth;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gimnasios = Gimnasio::where('users_id',Auth::user()->id)->get();
        foreach ($gimnasios as $gimnasio){
            if($gimnasio->users_id==Auth::user()->id){
                return view('perfiles.index',compact('gimnasio'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gimnasio = Gimnasio::find($id);
        return view('perfiles.edit',compact('gimnasio'));
  
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
        $gimnasio = Gimnasio::find($id);
        $gimnasio->users->name = $request->input('users->name');
        $gimnasio->gym_nombre  = $request->input('gym_nombre'); 
        $gimnasio->gym_direccion = $request->input('gym_direccion'); 
        $gimnasio->gym_telefono = $request->input('gym_telefono');
        $gimnasio->gym_url = $request->input('gym_url');
       
            $gimnasio->users->save();
            $gimnasio->save();

    return redirect()->route('perfiles.index')->with('success','Instructor edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gimnasio::find($id)->delete();
        return redirect()->route('perfiles.index')->with('success','Gimnasio deleted successfully');
 
    }
}
