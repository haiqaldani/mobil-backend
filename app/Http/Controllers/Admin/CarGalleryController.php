<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\CarGallery;
use App\CarModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarGalleryRequest;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Spatie\Activitylog\Models\Activity;

class CarGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CarGallery::with(['car_models'])->get();
        return view('pages.admin.car-gallery.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_models = Car::all();
        return view('pages.admin.gallery.create', [
            'car_models' => $car_models
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarGalleryRequest $request)
    {
        $data =  $request->car_model_id;
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.jpg';
                $time = Carbon::now()->toDateTimeString();
                $path = 'storage/assets/gallery/' . $fileName;
                Image::make($file)->save($path);
                $name = 'assets/gallery/' . $fileName;
                // $file->move(public_path().'/storage/assets/gallery', $name);
                $store_image[] = [
                    'image' => $name,
                    'car_model_id' => $data,
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                ];
            }
            CarGallery::insert($store_image);
        }


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
        $item = CarGallery::findOrFail($id);
        $car_models = Car::all();

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'car_models' => $car_models
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarGalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        $item = CarGallery::findOrFail($id);

        $item->update($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CarGallery::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('gallery.index');
    }
}
