<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarGalleryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Car::findOrFail($id);
        return view('pages.admin.car.gallery',[
            'item' => $item,
        ]);
    }
}
