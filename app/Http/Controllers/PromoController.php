<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\Promo;
use App\User;
use App\UsersPromos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class PromoController extends Controller
{
    public function index()
    {
        $items = Promo::all();
        return view('pages.promo', [
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = Promo::where('slug', $slug)->firstOrFail();
        $now = Carbon::now();
        return view('pages.promodetail', [
            'item' => $item,
            'now' => $now
        ]);
    }

    public function getPromo(Request $request)
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

        return redirect()->back();
    }

    public function claimPromo()
    {   
        $id = Auth::user()->id;
        $items = User::with('promos')->find($id);
        $now = Carbon::now();
        // $features = Car::with(['vehicle_features'])->find($id);
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];


        return view('pages.claimpromo',
        [
            'items' => $items,
            'now'   => $now
        ]);
    }

    public function buttonClaim(Request $request){

        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        
        UsersPromos::create($data);

        if(Promo::whereNotNull('quantity')->find($request->promos_id)){
            $total = Promo::find($request->promos_id);
            $total->update(['quantity' => $total->quantity - 1]);
        }
        

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->back();
    }

    
}