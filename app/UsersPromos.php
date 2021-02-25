<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPromos extends Model
{
    protected $fillable = [
        'users_id', 'promos_id', 
    ];

    // public function users()
    // {
    //     return $this->hasMany(User::class, 'users_id' ,'id');
    // }
    // public function promos()
    // {
    //     return $this->hasMany(Promo::class, 'promos_id' ,'id');
    // }
}
