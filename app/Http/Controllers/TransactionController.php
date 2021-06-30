<?php

namespace App\Http\Controllers;

use App\InterestBuyer;
use App\Pol;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class TransactionController extends Controller
{
    public function status($id)
    {
        $item = Transaction::with('users', 'interest_buyers.car_models', 'interest_buyers.car_variants' )->where('user_id', Auth::user()->id)->findOrFail($id);
        return view('pages.status-transaction', [
            'item' => $item
        ]);
    }

    public function index()
    {
        $items = Transaction::with('users')->get();
        return view('pages.mytransaction',[
            'items' => $items
        ]);
    }

    public function paymentUpdate(Request $request, $id)
    {
        $data = $request->all();
        $data['transaction_status'] = 4;
        $data['proof_payment'] = $request->file('proof_payment')->store(
            'assets/transaction', 'public'
        );


        $item = Transaction::findOrFail($id);
        $item->update($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('transaction-status', $id);
    }

    public function polsCreate(Request $request)
    {
        $data['transaction_status'] = 6;

        $id = $request->transaction_id;

        $item = Transaction::findOrFail($id);
        $item->update($data);

        $pols = $request->all();
        Pol::create($pols);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('transaction-status', $id);
    }
}
