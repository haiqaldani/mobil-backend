<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\Merk;
use Illuminate\Http\Request;

class CarsNewController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $merks = Merk::all();
        $models = CarModel::with(['merks', 'car_galleries', 'car_variants'])->get();
        return view('pages.carsnew',[
            'merks' => $merks,
            'models' => $models
        ]);
    }
}
