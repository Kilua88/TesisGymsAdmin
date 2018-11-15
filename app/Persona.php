<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'pers_nombre', 'pers_apellido',
        'pers_direccion',
        'pers_telefono', 
        ];

    public function persona(){
        return $this->belongsTo('App\Persona');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente','pers_id');
    }
    
    public function instructores(){
        return $this->belongsTo('App\Instructore','pers_id');
    }
}
