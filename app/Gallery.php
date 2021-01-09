<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cars_id', 'image'
    ];

    protected $hidden = [
    ];

    public function cars(){
        return $this->belongsTo( Car::class, 'travel_packages_id', 'id' );
    }

}
