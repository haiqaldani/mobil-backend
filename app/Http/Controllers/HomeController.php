<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Car;
use App\CarModel;
use App\CarType;
use App\Merk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $car_types = CarType::all();
        $banners = Banner::all();
        $merks = Merk::all();
        $models = CarModel::with('car_variants', 'car_galleries', 'merks')->get(); 
        $cars = Car::with(['galleries'])->get();
        return view('pages.home',[
            'car_types' => $car_types,
            'cars' => $cars,
            'banners' => $banners,
            'merks' => $merks,
            'models' => $models
        ]);
    }

    
}
