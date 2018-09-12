<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function protocols(){
        return $this->hasMany('App\Protocol');
    }

    public function adventures(){
        return $this->hasMany('App\Adventure');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // Aus dem Tutorial von https://medium.com/@ezp127/laravel-5-4-native-user-authentication-role-authorization-3dbae4049c8a
    // /**
    // * @param string|array $roles
    // */
    public function authorizeRoles($roles)
    {
    if (is_array($roles)) {
        return $this->hasAnyRole($roles) || 
                abort(401, 'This action is unauthorized.');
    }
    return $this->hasRole($roles) || 
            abort(401, 'This action is unauthorized.');
    }

    // /**
    // * Check if any role
    // * @param array $roles
    // */
    public function hasAnyRole($roles)
    {
    return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    // /**
    // * Check one role
    // * @param string $role
    // */
    public function hasRole($role)
    {
    return null !== $this->roles()->where('name', $role)->first();
    }
}
