<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Color extends Model
{

    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['car_model_id', 'color'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Color';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->email;
        return "{$user} have {$eventName} color";
    }
    protected $fillable = [
        'car_model_id', 'color_name'
    ];

    protected $hidden = [

    ];

    public function car_models(){
        return $this->belongsTo( CarModel::class, 'car_model_id', 'id' );
    }
}
