<?php

namespace App\Http\Controllers\Admin;

use App\CarType;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CarTypeRequest;
use Illuminate\Support\Str;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CarType::all();

        return view('pages.admin.car-type.index',[
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
        return view('pages.admin.car-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarTypeRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/car-types', 'public'
        );

        CarType::create($data);
        
        return redirect()->route('car-type.index');
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
        $item = CarType::findOrFail($id);

        return view('pages.admin.car-type.edit',[
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
    public function update(CarTypeRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/car-types', 'public'
        );

        $item = CarType::findOrFail($id);

        $item->update($data);

        return redirect()->route('car-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CarType::findorFail($id);
        $item->delete();

        return redirect()->route('car-type.index');

    }
}
