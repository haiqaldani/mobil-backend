<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\InterestBuyer;
use App\Merk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CarDetailController extends Controller
{
    public function index($slug, $slug_model)
    {

        $merk = Merk::where('slug', $slug)->firstOrFail();
        $item = CarModel::with(['merks', 'car_variants', 'car_galleries',  'colors'])->where('slug_model', $slug_model)->firstOrFail();
        $color = CarModel::with(['colors'])->where('slug_model', $slug_model)->firstOrFail();
        return view('pages.cardetail', [
            'item' => $item,
            'merk' => $merk,
            'color' => $color
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        InterestBuyer::create($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->back();
    }
}
