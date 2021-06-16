<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\User;
use Illuminate\Http\Request;
use Overtrue\LaravelFavorite\Favorite;
use Spatie\Activitylog\Models\Activity;

class FavoriteController extends Controller
{
    public function favoriteRequest(Request $request, $id)
    {

        $user = User::find($id);
        $carmodel = CarModel::find($request->favoriteable_id);

        $user->favorite($carmodel);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }


    public function deleteFavorite($id)
    {
        $item = Favorite::findorFail($id);
        $item->delete();
        
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }
}
