<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCuota extends Model
{
    protected $fillable = [
        
        'det_cuota_inicio', 
        'det_cuota_fin',
        'det_cuota_mes'
        
         ];

    public function clientes(){
         
        return $this->belongsTo('App\Cliente','cli_id');
    }    

    public function actividades(){
        return $this->belongsTo('App\Actividade','act_id');
    }


    public function users(){
        return $this->belongsTo('App\User','users_id');
    }
}
