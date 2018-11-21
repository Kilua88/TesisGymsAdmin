<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        
        'asis_fecha',
        
         ];


    public function users(){
        return $this->belongsTo('App\User','users_id');
    }

    public function clientes(){
        return $this->belongsTo('App\Cliente','cli_id');
    }
}
