<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        // 'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $maxAttempts = 3;

    public function cars()
    {
        return $this->hasMany(Car::class, 'id_seller', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }

    public function isAdmin() {
        return $this->roles()->where('role', 'Admin')->exists();
     }
     

}
