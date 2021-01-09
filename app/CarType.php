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

    public function cars(){
        return $this->hasMany( Car::class, 'car_types_id', 'id' );
    }


}
