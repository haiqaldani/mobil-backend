<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'car_year', 'car_types_id', 'transmission', 'fuel', 'edition', 'cc', 'kilometers', 'price', 'price_description', 'color', 'color', 'vehicle_features', 'description'
    ];

    protected $hidden = [];

    public function car_type()
    {
        return $this->belongsTo(CarType::class, 'car_types_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_seller', 'id');
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'cars_id', 'id');
    }


}
