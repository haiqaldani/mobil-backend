<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\IsAdmin;
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

Route::get('/profile', 'ProfileController@index')
    ->name('profile');

Route::get('/detail/{slug}/{id}', 'DetailController@index')
    ->name('detail');

Route::get('/listing/create', 'CreateMobilController@index')
    ->name('create-mobil')->middleware(['auth']);

Route::post('/listing/post-mobil', 'CreateMobilController@store')
    ->name('post-mobil');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/login', 'LoginController@login')->middleware('throttle:10,2');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'adminandop'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('car-type', 'CarTypeController');
        Route::resource('banner', 'BannerController');
        Route::resource('car-gallery', 'CarGalleryController');
        Route::resource('car', 'CarController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('vehicle-feature', 'VehicleFeatureController');
        Route::resource('profile', 'ProfileController');
        Route::group(['middleware' => ['auth', 'admin']], function () {
            Route::resource('activity-log', 'ActivityLogController');
            Route::resource('activity-login', 'ActivityLoginController');
            Route::resource('user', 'UserController');
            Route::resource('role', 'RoleController');
        });
    });

Auth::routes(['verify' => true]);
