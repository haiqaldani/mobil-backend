<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;


class CarType extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['title','image'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} car type";
    }
    protected $fillable = [
        'title', 'image'
    ];

    protected $hidden = [

    ];

    public function cars(){
        return $this->hasMany( Car::class, 'car_types_id', 'id' );
    }


}
