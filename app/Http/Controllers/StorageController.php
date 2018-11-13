<?php

namespace App\Http\Controllers;

use App\Image_Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    /**
* muestra el formulario para guardar archivos
*
* @return Response
*/
    public function index()
    {
        return \View::make('new');
    }

/**
* guarda un archivo en nuestro directorio local.
*
* @return Response
*/
    public function save(Request $request)
    {
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName(); 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        $path = Storage::putFileAs(Auth::user()->id,  $file, Auth::user()->id.'_'.$nombre);
        
        $imagenes = Image_Sliders::all();
        $band = true;
        foreach ($imagenes as $imagene){
            if ($imagene->url == 'app/'.$path){
                $band = false;
            }
        }
        if($band){
                $imagen = new Image_Sliders;
                $imagen->titulos = $nombre;
                $imagen->descripcion = $nombre;
                $imagen->url = 'app/'.$path;
                $imagen->users_id = Auth::user()->id;
                $imagen->save();
                return \View::make('home');
        }
        return \View::make('new');
    }
}
