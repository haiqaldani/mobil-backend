<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;
use Overtrue\LaravelFavorite\Favorite;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Spatie\Activitylog\Models\Activity;

class User extends Authenticatable implements HasLoginsAndDevicesInterface, MustVerifyEmail
{
    use Notifiable, HasLoginsAndDevices, Uuid, Favoriter;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'username',
        'phone_number',
        'password',
        'profil_picture',
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
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }

    public function isAdmin() {
        return $this->roles()->where('id', 1)->exists();
     }

    public function isOperator() {
        return $this->roles()->where('id', 2)->exists();
    }
    
    public function adminAndOperator() {
        return $this->roles()->where('id','<=', 2)->exists();
    }
     
    public function users()
    {
        return $this->hasMany(Activity::class, 'causer_id', 'id');
    }
    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'users_promos', 'users_id' , 'promos_id');
    }
    public function transactions(){
        return $this->hasOne( Transaction::class, 'user_id', 'id' );
    }

    public function interest_buyers(){
        return $this->hasMany( InterestBuyer::class, 'user_id', 'id' );
    }

}
