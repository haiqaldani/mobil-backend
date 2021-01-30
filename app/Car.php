<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;


class Car extends Model
{
    use SoftDeletes, LogsActivity, Sluggable, Uuid;

    protected $guarded = [];
    protected $cast = ['vehicle_features_id' => 'array'];

    public function setVehicleFeaturesIdAttribute($value)
    {
        $this->attributes['vehicle_features_id'] = json_encode($value);
    }

    public function getVehicleFeaturesIdAttribute($value)
    {
        return $this->attributes['vehicle_features_id'] = json_decode($value);
    }

    //log the changed attributes for allevent
    protected static $logAttributes = [
        'title',
        'car_year',
        'car_types_id',
        'transmission',
        'fuel',
        'edition',
        'cc',
        'kilometers',
        'price',
        'price_description',
        'color',
        'description',
        'model',
        'vehicle_features_id'

    ];


    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Car';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} car";
    }

    protected $fillable = [
        'title', 'slug', 'car_year', 'car_types_id', 'transmission', 'fuel', 'edition', 'cc', 'kilometers', 'price', 'price_description', 'color', 'description','id_seller','model', 'vehicle_features_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    protected $hidden = [];

    public function car_types()
    {
        return $this->belongsTo(CarType::class, 'car_types_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_seller', 'id');
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'cars_id', 'id');
    }
    // public function vehicle_features()
    // {
    //     return $this->belongsToMany(VehicleFeature::class, 'vehicle_features_id' , 'id');
    // }

    public function cars_vehicle_features()
    {
        return $this->hasMany(CarsVehicleFeatures::class, 'cars_id' , 'id');
    }

    // public function vehicle_feature()
    // {
    //     return $this->belongsToMany(VehicleFeature::class, 'cars_vehicle_features' ,'vehicle_features_id' , 'cars_id');
    // }
}
