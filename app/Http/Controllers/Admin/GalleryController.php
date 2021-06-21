<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with('cars')->get();
        return view('pages.admin.gallery.index',[
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
        $cars = Car::all();
        return view('pages.admin.gallery.create',[
            'cars' => $cars
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
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
                'cars_id' => $request->cars_id,
                'updated_at' =>  $time,
                'created_at' =>  $time,
            ];
        }
        Gallery::insert($store_image);
        
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('gallery.index');
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
        $item = Gallery::findOrFail($id);
        $cars = Car::all();

        return view('pages.admin.gallery.edit',[
            'item' => $item,
            'cars' => $cars
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = Gallery::findOrFail($id);

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
        $item = Gallery::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('gallery.index');

    }
}
