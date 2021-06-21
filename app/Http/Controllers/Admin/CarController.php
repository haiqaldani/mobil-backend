<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\CarModel;
use App\CarType;
use App\CarVariant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarRequest;
use App\Merk;
use App\User;
use App\VehicleFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Symfony\Component\Console\Input\Input;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Car::with(['car_types','users', 'car_models', 'merks', 'car_variants'])->get();

        return view('pages.admin.car.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_types = CarType::all();
        $merks = Merk::pluck('merk', 'id');
        $users = User::all();
        $eksteriors = VehicleFeature::where('category', 'Eksterior')->get();
        $interiors = VehicleFeature::where('category', 'Interior')->get();
        $perlengkapans = VehicleFeature::where('category', 'Perlengkapan')->get();
        return view('pages.admin.car.create',[
            'car_types' => $car_types,
            'users' => $users,
            'interiors' => $interiors,
            'eksteriors' => $eksteriors,
            'perlengkapans' => $perlengkapans,
            'merks' => $merks,
        ]);
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {

        
        $data = $request->validated();
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $car = Car::create($data);

        $car->vehicle_features()->attach($request->vehicle_features);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->route('car.index');
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
        $item = Car::with(['merks', 'car_models', 'car_variants'])->findOrFail($id);
        $car_types = CarType::all();
        $merks = Merk::pluck('merk', 'id');
        $eksteriors = VehicleFeature::where('category', 'Eksterior')->get();
        $interiors = VehicleFeature::where('category', 'Interior')->get();
        $perlengkapans = VehicleFeature::where('category', 'Perlengkapan')->get();
        return view('pages.admin.car.edit',[
            'item' => $item,
            'car_types' => $car_types,
            'interiors' => $interiors,
            'eksteriors' => $eksteriors,
            'perlengkapans' => $perlengkapans,
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
    public function update(CarRequest $request, $id)
    {
        $data = $request->validated();
        $data = $request->all();
        $data['slug'] = Str::title($request->title);

        $item = Car::findOrFail($id);
        
        $item->vehicle_features()->attach($request->vehicle_features);
        $item->update($data);
        

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Car::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('car.index');

    }

    public function carImage($id)
    {
        $item = Car::findOrFail($id);
        return view('pages.admin.car.addimage',[
            'item' => $item,
        ]);
    }
}
