<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarType;
use App\Http\Requests\Admin\CarRequest;
use App\VehicleFeature;
use Illuminate\Http\Request;

class CreateMobilController extends Controller
{
    public function index(){
        $car_types = CarType::all();
        $eksteriors = VehicleFeature::where('category', 'Eksterior')->get();
        $interiors = VehicleFeature::where('category', 'Interior')->get();
        $perlengkapans = VehicleFeature::where('category', 'Perlengkapan')->get();
        return view('pages.createmobil',[
            'car_types' => $car_types,
            'interiors' => $interiors,
            'eksteriors' => $eksteriors,
            'perlengkapans' => $perlengkapans,
        ]);
    }

    public function store(CarRequest $request){

        $data = $request->validated();
        $data = $request->all();
        $data['slug'] = $request->slug;
        Car::create($data);
        
        // $activity = Activity::all()->last();
        
        // $activity->description; //returns 'created'
        // $activity->subject; //returns the instance of NewsItem that was created
        // $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('profil.index');
    }
}
