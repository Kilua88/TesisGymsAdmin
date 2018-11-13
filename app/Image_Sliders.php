<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Sliders extends Model
{
    protected $fillable = [
        'url',
        'titulos', 
        'descripcion'
         ];

   
         public function users(){
            return $this->belongsTo('App\User','users_id');
        }
}
