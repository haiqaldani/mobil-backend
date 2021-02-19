<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
