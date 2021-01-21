<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Banner::all();

        return view('pages.admin.banner.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/banner', 'public'
        );

        Banner::create($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Banner::findOrFail($id);
        return view('pages.admin.banner.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/banner', 'public'
        );

        $item = Banner::findOrFail($id);

        $item->update($data);

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Banner::findorFail($id);
        $item->delete();

        $activity = Activity::all()->last();

        $activity->description; //returns 'created'
        $activity->subject; //returns the instance of NewsItem that was created
        $activity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];

        return redirect()->route('banner.index');

    }
}
