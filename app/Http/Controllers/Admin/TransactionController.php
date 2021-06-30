<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InterestBuyer;
use App\Merk;
use App\Transaction;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class TransactionController extends Controller
{
    public function edit($id){
        $item = Transaction::with(['interest_buyers', 'users'])->findOrFail($id);
        $merks = Merk::pluck('merk', 'id');
        return view('pages.admin.transaction.booking-fee',[
            'item' => $item,
            'merks' => $merks
        ]);
    }
    public function update(Request $request, $id)
    {
       
        $data = $request->all();
        $data['transaction_status'] = 3;
        $data['booking_fee'] = str_replace(".","", $request->booking_fee);

        $item = Transaction::findOrFail($id);
        $item->update($data);

        $car = InterestBuyer::findOrFail($request->interest_id);
        $car->update([
            'car_model_id' => $request->car_model_id,
            'car_variant_id' => $request->car_variant_id
        ]);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('interest-buyer.index');
    }
}
