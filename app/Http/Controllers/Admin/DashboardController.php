<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\CarType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::count();
        $car_types = CarType::count();
        return view('pages.admin.dashboard',[
            'cars' => $cars,
            'car_types' => $car_types,
        ]);
    }
}
