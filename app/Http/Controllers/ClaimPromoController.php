<?php

namespace App\Http\Controllers;

use App\Promo;
use App\User;
use App\UsersPromos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ClaimPromoController extends Controller
{
    public function index()
    {   
        $id = Auth::user()->id;
        $items = User::with('promos')->find($id);
        $now = Carbon::now();
        // $features = Car::with(['vehicle_features'])->find($id);
        return view('pages.claimpromo',
        [
            'items' => $items,
            'now'   => $now
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
        $promo = Promo::where('code', $request->code)->first();
        
        if(!$promo)
        {
            return redirect()->route('claim-promo')->withErrors('Kode promo masukkan tidak ada.');
        }

        $data = [
            'users_id' => Auth::id(),
            'promos_id' => $promo->id
        ];

        UsersPromos::create($data);




            
            // $activity = Activity::all()->last();

            // $activity->description; //returns 'created'
            // $activity->subject; //returns the instance of NewsItem that was created
            // $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->back();
    }
}
