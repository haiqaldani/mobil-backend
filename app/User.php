<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Spatie\Activitylog\Models\Activity;

class User extends Authenticatable implements HasLoginsAndDevicesInterface
{
    use Notifiable, HasLoginsAndDevices;

    

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
     
     
    public function users()
    {
        return $this->hasMany(Activity::class, 'causer_id', 'id');
    }

}
