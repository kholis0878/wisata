<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\District;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::with(['category', 'district'])->get();
        // $destinations = Destination::
        // join('categories', 'categories.id', '=', 'destinations.category_id')->join('districts', 'districts.id', '=', 'destinations.district_id')->get(['destinations.*', 'districts.district_name', 'categories.name AS category_name']);
        return view('destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $districts = District::all();
        return view('destination.create', compact('categories', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $photo = $request->file('destination_photo')->store('content');
        $destination = Destination::create([
                'category_id' => $request->get('category'),
                'district_id' => $request->get('district'),
                'name' => $request->get('destination_name'),
                'content' => $request->get('destination_content'),
                'photo' => $photo
            ]);
        return redirect()->route('destination.index');
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
    public function edit(Destination $destination)
    {
        $categories = Category::all();
        $districts = District::all();
        return view('destination.edit', compact('destination', 'categories', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $photo = $request->file('destination_photo')->store('content');
        $destination->update([
            'id' => $destination->id,
            'category_id' => $request->get('category'),
            'district_id' => $request->get('district'),
            'name' => $request->get('destination_name'),
            'content' => $request->get('destination_content'),
            'photo' => $photo
        ]);
        return redirect()->route('destination.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destination.index');
    }
}
