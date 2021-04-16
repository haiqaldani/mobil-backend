<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InterestBuyer;
use Illuminate\Http\Request;

class InterestBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InterestBuyer::all();
        return view('pages.admin.interest-buyer.index',[
            'items' => $items
        ]);
    }
}
