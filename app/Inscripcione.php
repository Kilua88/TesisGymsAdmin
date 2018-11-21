<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcione extends Model
{
    protected $fillable = [
        
        'insc_estado',
        
         ];

    public function clientes(){
         
        return $this->hasMany('App\Cliente','cli_id');
    }    

    public function actividades(){
        return $this->hasMany('App\Actividade','act_id');
    }
}
