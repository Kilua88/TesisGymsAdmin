<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    public function clientes(){
        return $this->hasMany('App\Cliente','users_id');
    }
    public function imagenes(){
        return $this->hasMany('App\Image_Sliders','users_id');
    }

    public function actividades(){
        return $this->hasMany('App\Actividade','users_id');
    }
    public function instructores(){
        return $this->hasMany('App\Instructore','users_id');
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function gimnasio(){
        return $this->belongsTo('App\Gimnasio');
    }

    public function detallecuotas(){
        return $this->hasMany('App\DetalleCuota','users_id');
    }

}
