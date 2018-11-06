<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'cli_id',
        'pers_id', 'users_id',
        'cli_edad',
         ];

    public function persona(){
         
        return $this->belongsTo(Persona::class,'pers_id');
    }    

    public function users(){
        return $this->belongsTo('App\User','users_id');
    }
}
