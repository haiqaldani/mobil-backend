<?php

namespace App\Http\Controllers;

use App\Car;
use App\VehicleFeature;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){

        $wa = $request->fullUrl();
        $item = Car::with(['galleries', 'users','vehicle_features'])->where('slug', $slug)->firstOrFail();
        $features = Car::with('cars_vehicle_features')->where('slug', $slug)->firstOrFail();
        return view('pages.detail',[
            'item' => $item,
            'wa' => $wa,
            'features' => $features,
        ]);
    }
}
