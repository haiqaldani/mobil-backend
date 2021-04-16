<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\Merk;
use Illuminate\Http\Request;

class CarDetailController extends Controller
{
    public function index($slug, $slug_model)
    {

        $merk = Merk::where('slug', $slug)->firstOrFail();
        $item = CarModel::with(['merks', 'car_variants', 'car_galleries'])->where('slug_model', $slug_model)->firstOrFail();
        return view('pages.cardetail', [
            'item' => $item,
            'merk' => $merk
        ]);
    }
}
