<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Merk extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['merk','image', 'slug','description'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Merk';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->email;
        return "{$user} have {$eventName} merk";
    }
    protected $fillable = [
        'merk', 'image', 'slug','description'
    ];

    protected $hidden = [

    ];

    public function car_models(){
        return $this->hasMany( CarModel::class, 'merk_id', 'id' );
    }
    public function cars(){
        return $this->hasMany( Car::class, 'merk_id', 'id' );
    }


}

