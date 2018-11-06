<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'inst_descripcion', 'inst_actividad'
        ];

        public function persona(){
             
            return $this->belongsTo(Persona::class,'pers_id');
        }    
    
        public function users(){
            return $this->belongsTo('App\User','users_id');
        }
}
