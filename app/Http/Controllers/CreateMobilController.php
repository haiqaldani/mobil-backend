<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarType;
use App\Gallery;
use App\Http\Requests\Admin\CarRequest;
use App\VehicleFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function store(CarRequest $request)
    {

        $data = $request->validated();
        $data = $request->all();
        
        $data['slug'] = Str::slug($request->title);
        


        // if($request->hasfile('image'))
        //  {
        //     foreach($request->file('image') as $file)
        //     {
        //         $name = time().'.'.$file->extension();
        //         $file->move(public_path().'/asset/car/', $name);  
        //         $data[] = $name;  
        //     }
        //  }

        
        // $file= new Gallery();
        // $file->image=json_encode($data);
        // //  $file['cars_id'] = $request->uuid();
        // $file['cars_id'] = $request->id;
        // $file->save();
        $item = Car::create($data);
        $item->vehicle_features()->attach($request->vehicle_features);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('profil');
    }
}
