<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\CarVariant;
use App\Merk;
use Illuminate\Http\Request;

class MerkDetailController extends Controller
{
    public function index($slug)
    {

        $item = Merk::with('car_models.car_variants', 'car_models.car_variants', 'car_models.colors')->where('slug', $slug)->firstOrFail();
        $models = CarModel::with(['merks', 'car_galleries', 'car_variants', 'colors'])->get();
        // $variants = CarVariant::with(['car_models'])->get();
        return view('pages.merkdetail', [
            'item' => $item,
            // 'variants' => $variants,
            'models' => $models,
        ]);
    }
}
