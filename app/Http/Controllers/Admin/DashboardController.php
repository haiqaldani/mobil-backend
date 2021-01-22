<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\CarType;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lab404\AuthChecker\Models\Login;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::count();
        $car_types = CarType::count();
        $new_cars = Car::where('Condition', 'Baru')->count();
        $used_cars = Car::where('Condition', 'Bekas')->count();

        return view('pages.admin.dashboard', [
            'cars' => $cars,
            'car_types' => $car_types,
            'new_cars' => $new_cars,
            'used_cars' => $used_cars
        ]);
    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
