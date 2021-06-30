<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class InterestBuyer extends Model
{
    use SoftDeletes, LogsActivity;

    //log the changed attributes for allevent
    protected static $logAttributes = ['schedule', 'payment', 'car_model_id','user_id'];

    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangedAttributes = ['update_at'];

    // logging only th changed attributes
    protected static $logOnlyDirty = true;

    protected static $logName = 'Gallery';


    protected static $recordEvent = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        $user = Auth::user()->name;
        return "{$user} have {$eventName} interset buyer";
    }

    protected $fillable = [
         'schedule', 'payment', 'car_model_id', 'user_id'
    ];

    protected $hidden = [
    ];

    public function car_models(){
        return $this->belongsTo( CarModel::class, 'car_model_id', 'id' );
    }
    public function car_variants(){
        return $this->belongsTo( CarVariant::class, 'car_variant_id', 'id' );
    }

    public function users(){
        return $this->belongsTo( User::class, 'user_id', 'id' );
    }
    public function transactions(){
        return $this->hasOne( Transaction::class, 'interest_id', 'id' );
    }

}
