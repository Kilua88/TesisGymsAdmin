<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        
        'cli_contact_nombre', 'cli_contact_apellido','cli_contact_telefono'
        
         ];

    public function persona(){
         
        return $this->belongsTo(Persona::class,'pers_id');
    }    

    public function users(){
        return $this->belongsTo('App\User','users_id');
    }

    public function detallecoutas(){
        return $this->hasMany('App\DetalleCuota','cli_id');
    }


    public function inscripciones(){
        return $this->belongsTo('App\Inscripcione');
    }
}
