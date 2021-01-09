<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'image'
    ];

    protected $hidden = [

    ];

    public function car(){
        return $this->hasMany( Car::class, 'car_types_id', 'id' );
    }

    public function cars(){
        return $this->belongsTo( Car::class, 'travel_packages_id', 'id' );
    }

}
