<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request){

        $cars = Car::all();
        // $cars = Car::with(['galleries'])->where('slug', $slug)->firstOrFail();
        return view ('pages.detail',[
            'cars' => $cars
        ]);
    }
}
