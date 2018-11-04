<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'inst_descripcion', 'inst_actividad'
        ];
}
