<?php

namespace App\Http\Controllers\Admin;

use App\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelVariantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CarModel::findOrFail($id);
        return view('pages.admin.car-model.addvariant',[
            'item' => $item,
        ]);
    }
}
