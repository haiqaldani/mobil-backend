<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Pol extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['name', 'idcard_number', 'address', 'place_of_birth', 'date_of_birth', 'transaction_id'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Promos';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} POL";
    }

    protected $fillable = [
        'name', 'idcard_number', 'address', 'place_of_birth', 'date_of_birth', 'transaction_id'
    ];

    protected $hidden = [
    ];

    public function transactions()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }

   
}
