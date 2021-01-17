<?php

namespace App\Http\Controllers;

use App\Car;
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
        $items = Car::where('Condition', 'Baru')->get();
        return view('pages.carsnew',[
            'items' => $items
        ]);
    }
}
