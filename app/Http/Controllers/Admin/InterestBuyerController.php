<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InterestBuyer;
use App\Pol;
use App\Transaction;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class InterestBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InterestBuyer::with(['users','transactions', 'car_models'])->get();
        return view('pages.admin.interest-buyer.index', [
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = Transaction::with(['interest_buyers', 'users', 'pols'])->findOrFail($id);
        return view('pages.admin.interest-buyer.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $data['transaction_status'] = $request->transaction_status;
        $item = Transaction::findOrFail($id);

        
        if ($item->transaction_status == 6) {
            $pols = $request->except('transaction_status');
            $itempols = Transaction::findOrFail($id);
            $itempols->update($pols);
        }

        $item->update($data);

       


        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('interest-buyer.index');
    }

    public function destroy($id)
    {
        $item = InterestBuyer::with(['transactions'])->findorFail($id);
        $transaction = Transaction::findorFail($item->transactions->id);
        $item->delete();
        $transaction->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('interest-buyer.index');

    }
}
