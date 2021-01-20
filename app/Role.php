<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role'
    ];

    protected $hidden = [
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'roles_id', 'id');
    }
}
