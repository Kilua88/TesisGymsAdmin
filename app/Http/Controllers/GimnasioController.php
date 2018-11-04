<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Controller\Auth;
use App\User;
use App\Menu;


class GimnasioController extends Controller
{


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gimnasios = User::all();
      return view('gimnasios.index',compact('gimnasios'))->with('i', (request()->input('page', 1) - 1) * 5);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gimnasios.create');
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
        request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            ]);
            User::create($request->all());
            return redirect()->route('gimnasios.index')->with('success','Gimnasio created successfully');
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
        $gimnasio = User::find($id);
        return view('gimnasios.show',compact('gimnasio'));
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
        $gimnasio = User::find($id);
        return view('gimnasios.edit',compact('gimnasio'));
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
        request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            ]);
            User::find($id)->update($request->all());
            return redirect()->route('gimnasios.index')->with('success','Gimnasio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('gimnasios.index')->with('success','Gimnasio deleted successfully');
    }
}
