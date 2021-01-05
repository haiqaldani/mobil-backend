<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarType;
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
        $car_types=CarType::all();
        $cars = Car::with(['galleries'])->get();
        return view('pages.home',[
            'car_types' => $car_types,
            'cars' => $cars
        ]);
    }
}
