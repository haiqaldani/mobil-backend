<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Lab404\AuthChecker\Models\Login;

class ActivityLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = DB::table('logins')->join('devices', 'device_id', '=', 'logins.device_id')->select('logins.*', 'devices.*')->get();
        $items = Login::all();
        return view('pages.admin.activity-login.index', [
            'items' => $items,
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
        $item = Login::findorFail($id);
        $item->delete();

        return redirect()->route('activity-login.index');
    }
}
