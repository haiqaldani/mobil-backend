<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;


class Gallery extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['image','cars_id'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Gallery';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} gallery";
    }

    protected $fillable = [
        'cars_id', 'image'
    ];

    protected $hidden = [
    ];

    public function cars(){
        return $this->belongsTo( Car::class, 'cars_id', 'id' );
    }

}
