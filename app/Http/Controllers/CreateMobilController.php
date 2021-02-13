<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarType;
use App\Gallery;
use App\Http\Requests\CreateMobilRequest;
use App\VehicleFeature;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CreateMobilController extends Controller
{
    public function index()
    {
        $car_types = CarType::all();
        $eksteriors = VehicleFeature::where('category', 'Eksterior')->get();
        $interiors = VehicleFeature::where('category', 'Interior')->get();
        $perlengkapans = VehicleFeature::where('category', 'Perlengkapan')->get();
        return view('pages.createmobil', [
            'car_types' => $car_types,
            'interiors' => $interiors,
            'eksteriors' => $eksteriors,
            'perlengkapans' => $perlengkapans,
        ]);
    }

    public function store(CreateMobilRequest $request)
    {

        $data = $request->validated();
        $data = [
            'id' => $request->id,
            'id_seller' => Auth::id(),
            'title' => $request->title,
            'car_type' => $request->car_type,
            'car_year' => $request->car_year,
            'car_types_id' => $request->car_types_id,
            'transmission' => $request->transmission,
            'fuel' => $request->fuel,
            'cc' => $request->cc,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'description' => $request->description,
            'color' => $request->color,
            'condition' => $request->condition,
            'model' => $request->model,
            'edition' => $request->edition,
            'price_description' => $request->price_description,

        ];
        if (isset($request->id)) {
            return null;
        } else {
            $id = [
                'id' => $request->id
            ];
        }

        $save = Car::updateOrcreate($id, $data);
        $save->vehicle_features()->attach($request->vehicle_features);

        
        if ($request->hasFile('image'))
        {
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileName = Carbon::now()->timestamp . '_'. uniqid() . '.jpg';
                $time = Carbon::now()->toDateTimeString();
                $path = 'storage/assets/gallery/'.$fileName;
                Image::make($file)->save($path);
                $name = 'assets/gallery/'.$fileName;
                // $file->move(public_path().'/storage/assets/gallery', $name);
                $store_image[] = [
                    'image' => $name,
                    'cars_id' => $save['id'],
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                ];
                
            }
            Gallery::insert($store_image);
        }
        

        // $images = $request->image;
        // if (is_array($images) || is_object($images)) {
        //     foreach ($images as $file) {
        //         $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.jpg';
        //         Image::make($file['src'])->save('assets/gallery/' . $fileName);
        //         $image = 'assets/gallery/' . $fileName;
        //         Gallery::create([
        //             'image'      => $image,
        //             'cars_id'    => $save['id']
        //         ]);
        //     }
        // }
        // if ($save) {
        //     return response()->json([
        //         'success' => true,
        //         'data' => $save
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'data not saved'
        //     ], 400);
        // }


        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('profil');
    }
}
