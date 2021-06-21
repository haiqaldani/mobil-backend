<?php

namespace App\Http\Controllers\Admin;

use App\CarGallery;
use App\CarModel;
use App\CarVariant;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarModelRequest;
use App\Merk;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CarModel::with(['merks', 'car_galleries', 'car_variants'])->get();
        $clr = Color::with(['car_models'])->get();
        // $images = CarGallery::with(['car_models'])->get();
        // $variant = CarVariant::with(['car_models'])->get();
        return view('pages.admin.car-model.index', [
            'items' => $items,
            'clr' => $clr,
            // 'images' => $images,
            // 'variant' => $variant,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::all();
        return view('pages.admin.car-model.create',[
            'merks' => $merks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarModelRequest $request)
    {
        $data = $request->all();

        CarModel::create($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('car-model.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CarModel::findOrFail($id);
        $merks = Merk::all();
        return view('pages.admin.car-model.edit', [
            'item' => $item,
            'merks' => $merks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarModelRequest $request, $id)
    {
        $data = $request->all();

        $item = CarModel::findOrFail($id);

        $item->update($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('car-model.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CarModel::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('car-model.index');
    }

    public function modelImage($id)
    {
        $item = CarModel::findOrFail($id);
        return view('pages.admin.car-model.addimage',[
            'item' => $item,
        ]);
    }

    public function modelVariant($id)
    {
        $item = CarModel::findOrFail($id);
        return view('pages.admin.car-model.addvariant',[
            'item' => $item,
        ]);
    }
}
