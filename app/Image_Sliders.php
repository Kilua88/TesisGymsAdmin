<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Sliders extends Model
{
    protected $fillable = [
        'url',
        'nombre_foto',
        'titulos', 
        'descripcion',
        'estado'
         ];

   
         public function users(){
            return $this->belongsTo('App\User','users_id');
        }
}
