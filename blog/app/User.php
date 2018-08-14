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
<<<<<<< HEAD

    public function protocols(){
        return $this->hasMany('App\Protocol');
    }
=======
>>>>>>> 7959e1fa7f1869a475e4a55a6dbaef2112cedf15
}
