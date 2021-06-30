<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['user_id', 'transaction_status', 'code', 'interest_id', 'booking_fee', 'proof_payment'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Gallery';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} transaction";
    }

    protected $fillable = [
        'user_id', 'transaction_status', 'code', 'interest_id', 'booking_fee', 'proof_payment'
    ];

    protected $hidden = [
    ];

    public function users(){
        return $this->belongsTo( User::class, 'user_id', 'id' );
    }

    public function interest_buyers(){
        return $this->belongsTo( InterestBuyer::class, 'interest_id', 'id' );
    }

    public function pols()
    {
        return $this->belongsTo(Pol::class, 'id', 'transaction_id');
    }
}
