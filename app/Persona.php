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
        return $this->belongTo('App\Persona');
    }

    public function cliente(){
        return $this->belongTo('App\Cliente','pers_id');
    }
}
