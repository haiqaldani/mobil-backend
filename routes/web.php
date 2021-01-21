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

Route::get('/cars/used', 'CarsUsedController@index')
    ->name('carsused');

Route::get('/cars/new', 'CarsNewController@index')
    ->name('carsnew');

Route::get('/detail/{slug}', 'DetailController@index')
    ->name('detail');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/login','LoginController@login')->middleware('throttle:10,2');

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
        Route::resource('role', 'RoleController');
        Route::resource('activity-log', 'ActivityLogController');

    });


Auth::routes(['verify' => true]);
