<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    protected $fillable = [
        'gym_nombre',
        'gym_direccion', 
        'gym_telefono',
         ];

   
         public function users(){
            return $this->belongsTo('App\User','users_id');
        }
}
