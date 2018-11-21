<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    protected $fillable = [
        'act_nombre',
        'act_cuota',
         ];

   
         public function users(){
            return $this->belongsTo('App\User','users_id');
        }

         public function detallecoutas(){
            return $this->hasMany('App\DetalleCuota','cli_id');
        }

        public function moneda(){
            return $this->belongsTo('App\Moneda','moneda_id');
        }

        public function inscripciones(){
            return $this->belongsTo('App\Inscripcione');
        }
}
