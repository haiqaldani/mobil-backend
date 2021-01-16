<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsUsedController extends Controller
{
    public function index(){

        return view('pages.carsused');
    }
}
