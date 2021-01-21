<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Activity::with('users')->get();
        $items = DB::table('activity_log')->join('users', 'causer_id', '=', 'activity_log.causer_id')->select('activity_log.*', 'users.*')->get();
        return view('pages.admin.activity-log.index',[
            'items' => $items
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Activity::findorFail($id);
        $item->delete();

        return redirect()->route('activity-log.index');

    }
}
