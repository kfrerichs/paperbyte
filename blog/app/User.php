<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    public function group()
    {
      return $this->belongsToMany('App\Group');
    }

    public function protocols(){
        return $this->hasMany('App\Protocol');
    }

    public function adventures(){
        return $this->hasMany('App\Adventure');
    }
}