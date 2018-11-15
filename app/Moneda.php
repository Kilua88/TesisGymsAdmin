<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $fillable = [
        
        'tipo_moneda', 
        
         ];

         public function actividad(){
            return $this->hasMany('App\Actividade','moneda_id');
        }
}
