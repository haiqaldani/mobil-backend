<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarModel;
use App\CarType;
use App\Merk;
use App\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Overtrue\LaravelFavorite\Favorite;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $item = Auth::user();
        return view('pages.profile', [
            'item' => $item,
        ]);
    }

    public function update(Request $request)
    {


        $user = Auth::user();
        // if ($request->hasFile('profil_picture')) {
        //     $files = $request->file('profil_picture');
        //     $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.jpg';
        //     $path = 'storage/assets/profile/' . $fileName;
        //     Image::make($files)->save($path);
        //     $name = 'assets/profile/' . $fileName;
        //     $store_image = [
        //         'profil_picture' => $name,
        //     ];

        //     User::update($store_image);
        // }



        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->address = $request->address;
        $files = $request->file('profil_picture');
        $fileName = 'assets/profil/'.$user->username.'_profile.jpg';
        $path = 'storage/'.$fileName;

        Image::make($files)->save($path);

        $user->profil_picture = $fileName;
        $user->update();
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->back();
    }

    public function password()
    {  
        return view('pages.changepassword');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }
             
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
            if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
                        //New password and confirm password are not same
                        return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
            }
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
             
            return redirect()->back()->with("success","Password changed successfully !");
    }

    public function favorite()
    {
        $items = CarModel::with('favorites', 'car_galleries','car_variants')->get();
        return view('pages.favorite', [
            'items' => $items
        ]);
    }
    public function myCar()
    {
        $items = Car::with('merks', 'galleries','car_variants', 'car_models')->where('id_seller', Auth::user()->id)->get();
        return view('pages.mycar', [
            'items' => $items
        ]);
    }

    
}
