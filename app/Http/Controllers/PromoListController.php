<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

class PromoListController extends Controller
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
        return view('pages.promodetail', [
            'item' => $item
        ]);
    }

    
}