<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class VehicleFeature extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['category','feature'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Vehicle Features';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} vehicle features";
    }

    protected $fillable = [
        'category', 'feature'
    ];

    protected $hidden = [
    ];

    // public function cars()
    // {
    //     return $this->belongsToMany(Car::class, 'vehicle_features_id', 'id');
    // }

    // public function cars()
    // {
    //     return $this->hasOne(Car::class, 'cars_vehicle_features', 'cars_id', 'vehicle_features_id');
    // }

    public function cars_vehicle_features()
    {
        return $this->belongsTo(CarsVehicleFeatures::class, 'vehicle_features_id' , 'id');
    }

    // 
}
