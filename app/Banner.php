<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;


class Banner extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['image', 'description'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} banner";
    }
    protected $fillable = [
        'image', 'description'
    ];

    protected $hidden = [

    ];


}
