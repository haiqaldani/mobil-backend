<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarsUsedController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Car::with('galleries')->get();
        return view('pages.carsused',[
            'items' => $items
        ]);
    }
}
