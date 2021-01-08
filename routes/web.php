<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')
    ->name('home');

    Route::get('/cars', 'CarsController@index')
    ->name('cars');

Route::get('/detail', 'DetailController@index')
    ->name('detail');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('car-type', 'CarTypeController');
        Route::resource('banner', 'BannerController');
        Route::resource('car', 'CarController');
        Route::resource('gallery', 'GalleryController');

    });


Auth::routes(['verify' => true]);
