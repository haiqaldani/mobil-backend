<?php

namespace App\Http\Controllers\Admin;

use App\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Overtrue\LaravelFavorite\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $items = CarModel::withCount('favoriters')->get();

        return view('pages.admin.favorite.index', [
            'items' => $items
        ]);
    }
}
