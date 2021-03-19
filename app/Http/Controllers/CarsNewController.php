<?php

namespace App\Http\Controllers;

use App\Car;
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
        return view('pages.carsnew',[
            'merks' => $merks
        ]);
    }
}
