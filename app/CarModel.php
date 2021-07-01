<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFavorite\Favorite;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Spatie\Activitylog\Traits\LogsActivity;

class CarModel extends Model
{
    use SoftDeletes, LogsActivity, Favoriteable;

    //log the changed attributes for allevent
    protected static $logAttributes = ['merk_id', 'model', 'description', 'slug_model'];

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
        'merk_id', 'model', 'description', 'slug_model'
    ];

    protected $hidden = [

    ];

    public function merks(){
        return $this->belongsTo( Merk::class, 'merk_id', 'id' );
    }

   

    public function car_galleries(){
        return $this->hasMany( CarGallery::class, 'car_model_id', 'id' );
    }

    public function favoriters(){
        return $this->belongsTo( Favorite::class, 'id', 'favoriteable_id' );
    }

    public function car_variants(){
        return $this->hasMany( CarVariant::class, 'car_model_id', 'id' );
    }
    public function interest_buyers(){
        return $this->hasMany( InterestBuyer::class, 'car_model_id', 'id' );
    }

    public function colors(){
        return $this->hasMany( Color::class, 'car_model_id', 'id' );
    }

}
