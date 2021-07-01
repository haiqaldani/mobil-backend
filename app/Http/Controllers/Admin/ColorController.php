<?php

namespace App\Http\Controllers\Admin;

use App\CarModel;
use App\Color;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Color::with(['car_models'])->get();
        return view('pages.admin.color.index', [
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
        $car_models = CarModel::all();
        return view('pages.admin.color.create', [
            'car_models' => $car_models
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->car_model_id;
        if ($request->has('color_name')) {
            $colors = $request->color_name;
            foreach ($colors as $color) {
                $time = Carbon::now()->toDateTimeString();
                // $file->move(public_path().'/storage/assets/gallery', $name);
                $store_image[] = [
                    'color_name' => $color,
                    'car_model_id' => $data,
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                ];
            }
            Color::insert($store_image);
        }
    
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('color.index');
    }


    public function destroy($id)
    {
        $item = Color::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('color.index');
    }
}
