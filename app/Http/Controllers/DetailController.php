<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug){

        $wa = $request->fullUrl();
        $item = Car::with(['galleries', 'users'])->where('slug', $slug)->firstOrFail();
        return view('pages.detail',[
            'item' => $item,
            'wa' => $wa,
        ]);
    }
}
