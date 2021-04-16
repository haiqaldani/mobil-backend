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

Route::get('/cars', 'CarsNewController@index')
    ->name('carsnew');

Route::get('/profile', 'ProfileController@index')
    ->name('profile');

Route::get('/promo', 'PromoListController@index')
    ->name('promo');

Route::get('/promo/{promo}', 'PromoListController@show')
    ->name('promo-detail');

Route::get('/cars/merk/{merk}', 'MerkDetailController@index')
    ->name('merk-list');

Route::get('/cars/merk/{merk}/{model}', 'CarDetailController@index')
    ->name('model-detail');

Route::post('/cars/merk/interest', 'InterestController@store')
    ->name('interest.store');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/account/profile', 'ProfileController@edit')
        ->name('profile-seller.edit');

    Route::patch('/account/profile', 'ProfileController@update')
        ->name('profile-seller.update');

    Route::get('/account/change-password', 'PasswordController@index')
        ->name('change-password');

    Route::patch('/account/change-password', 'PasswordController@update')
        ->name('change-password.update');

    Route::patch('/account/wishlist', 'ProfileController@index')
        ->name('wishlist');

    Route::get('/claim-promo', 'ClaimPromoController@index')
        ->name('claim-promo');

    Route::post('/claim-promo/claim', 'ClaimPromoController@store')
        ->name('claim');
});

Route::get('/listing/create', 'CreateMobilController@index')
    ->name('create-mobil')->middleware(['auth']);

Route::get('/get-model-list', 'CreateMobilController@getModel')->name('create-mobil.getmodel');

Route::get('/get-variant-list', 'CreateMobilController@getVariant')->name('create-mobil.getvariant');

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
        Route::resource('model-image', 'ModelImageController');
        Route::resource('model-variant', 'ModelVariantController');
        Route::post('uploadbanner', 'UploadController@uploadbanner');
        Route::resource('car', 'CarController');
        Route::resource('merk', 'MerkController');
        Route::resource('interest-buyer', 'InterestBuyerController');
        Route::resource('car-model', 'CarModelController');
        Route::resource('car-variant', 'CarVariantController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('vehicle-feature', 'VehicleFeatureController');
        Route::resource('profile', 'ProfileController');
        Route::resource('promo', 'PromoController');
        Route::group(['middleware' => ['auth', 'admin']], function () {
            Route::resource('activity-log', 'ActivityLogController');
            Route::resource('activity-login', 'ActivityLoginController');
            Route::resource('user', 'UserController');
            Route::resource('role', 'RoleController');
        });
    });

Auth::routes(['verify' => true]);
