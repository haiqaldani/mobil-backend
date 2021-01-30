<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsVehicleFeatures extends Model
{
    protected $fillable = [
        'cars_id', 'vehicle_features_id', 
    ];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'cars_id' , 'id');
    }

    public function vehicle_feature()
    {
        return $this->hasOne(VehicleFeature::class, 'vehicle_features_id' , 'id');
    }
}
