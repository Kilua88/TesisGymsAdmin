<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    protected $fillable = [
        'act_nombre',
        'act_moneda', 
        'act_cuota',
         ];

   
         public function users(){
            return $this->belongsTo('App\User','users_id');
        }
}
