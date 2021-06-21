<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarsVehicleFeatures;
use App\VehicleFeature;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){

        $wa = $request->fullUrl();
        $item = Car::with(['galleries', 'users', 'vehicle_features'])->where('slug', $slug)->firstOrFail();
        // $features = Car::with(['vehicle_features'])->where('slug', $slug)->get();
        // $features = CarsVehicleFeatures::with(['vehicle_features'])->findOrFail($item);
        return view('pages.detail',[
            'item' => $item,
            'wa' => $wa,
            // 'features' => $features
        ]);
    }
}
