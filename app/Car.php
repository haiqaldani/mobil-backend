<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;


class Car extends Model
{
    use SoftDeletes, LogsActivity;

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
        'vehicle_features',
        'description'

    ];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} car";
    }

    protected $fillable = [
        'title', 'slug', 'car_year', 'car_types_id', 'transmission', 'fuel', 'edition', 'cc', 'kilometers', 'price', 'price_description', 'color', 'vehicle_features', 'description','id_seller'
    ];

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


}
