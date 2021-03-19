<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class CarModel extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['merk_id', 'model'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Model';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->email;
        return "{$user} have {$eventName} model";
    }
    protected $fillable = [
        'merk_id', 'model'
    ];

    protected $hidden = [

    ];

    public function merks(){
        return $this->belongsTo( Merk::class, 'merk_id', 'id' );
    }

    public function car_galleries(){
        return $this->hasMany( CarGallery::class, 'car_model_id', 'id' );
    }

    public function cars(){
        return $this->hasMany( Car::class, 'car_model_id', 'id' );
    }

    public function car_variants(){
        return $this->hasMany( CarVariant::class, 'car_model_id', 'id' );
    }


}
