<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\CarType;
use App\CarVariant;
use App\Gallery;
use App\Http\Requests\CreateMobilRequest;
use App\Merk;
use App\VehicleFeature;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CreateMobilController extends Controller
{
    public function index()
    {
        $car_types = CarType::all();
        $merks = Merk::pluck('merk', 'id');
        $eksteriors = VehicleFeature::where('category', 'Eksterior')->get();
        $interiors = VehicleFeature::where('category', 'Interior')->get();
        $perlengkapans = VehicleFeature::where('category', 'Perlengkapan')->get();
        return view('pages.createmobil', [
            'car_types' => $car_types,
            'interiors' => $interiors,
            'eksteriors' => $eksteriors,
            'perlengkapans' => $perlengkapans,
            'merks' => $merks,
        ]);
    }

    // public function getMerk()
    // {
    //     $merks = Merk::pluck('merk', 'id');
    //     return view('pages.createmobil', compact('merks'));
    // }

    public function getModel(Request $request)
    {
        $car_models = CarModel::where('merk_id', $request->get('merk_id'))->pluck('model', 'id');

    return response()->json($car_models);
    }

    public function getVariant(Request $request)
    {
        $car_variants = CarVariant::where('car_model_id', $request->get('car_model_id'))->pluck('edition', 'id');

    return response()->json($car_variants);
    }

    public function carUpdate(CreateMobilRequest $request, $id)
    {

        $data = $request->all;

        $item = Car::findOrFail($id);
        $item->update($data);

        // $save->vehicle_features()->attach($request->vehicle_features);

        
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
                    'cars_id' => $id,
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                ];
            }
            Gallery::insert($store_image);
        }


        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('mycar');
    }
    public function carEdit($id)
    {
        $car_types = CarType::all();
        $merks = Merk::pluck('merk', 'id');
        $item = Car::with(['merks', 'galleries', 'car_models', 'car_variants'])->findOrFail($id);
        return view('pages.mycar-edit',[
            'item' => $item,
            'car_types' => $car_types,
            'merks' => $merks
        ]);
    }

    public function deleteImage($id)
    {
        $item = Gallery::findorFail($id);
        $item->delete();
        
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }

    public function carDelete($id)
    {
        $item = Car::findorFail($id);
        $item->delete();
        
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }

    public function carSold(Request $request, $id)
    {
        $data = $request->all();
        $item = Car::findorFail($id);
        $item->update($data);
        
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }
}
