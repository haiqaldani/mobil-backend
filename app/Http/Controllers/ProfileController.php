<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $roles = Role::all();
        $item = User::with(['roles'])->findOrFail($id);
        return view('pages.profile', [
            'item' => $item,
            'roles' => $roles
        ]);
    }

    public function create(Request $request, $id)
    {
        $data = $request->all();

        $item = User::findOrFail($id);
        $item->update($data);
        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
        return redirect()->route('profile');
    }
}
