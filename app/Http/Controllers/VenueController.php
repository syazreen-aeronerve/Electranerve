<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\venue;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fetchVenue(Request $request)
    {
        $data = venue::where('id',$request->id)->first();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');

        if($type == 'C'){
        $venue = new venue;
        $venue->venue_name = $request->input('venue_name');
        $venue->venue_address = $request->input('venue_address');
        $venue->venue_latitude = $request->input('latitude');
        $venue->venue_longitude = $request->input('longitude');
        $venue->venue_description = $request->input('venue_description');
        $venue->venue_capacity = $request->input('venue_capacity');
        $venue->created_by =  auth()->user()->id;
        $venue->updated_by =  auth()->user()->id;

        $file = $request->file('venue_image');
        $filename = auth()->user()->id.time().'-'.$file->getClientOriginalName();
        $file->move(public_path('/VenueImage'), $filename);

        $venue->venue_image = $filename;

        $venue->save();

        return redirect()->back()->with('success','Venue has been successfully added!');
        }
        else{
        $venue = venue::where('id',$id)->first();
        $venue->venue_name = $request->input('venue_name');
        $venue->venue_address = $request->input('venue_address');
        $venue->venue_latitude = $request->input('latitude');
        $venue->venue_longitude = $request->input('longitude');
        $venue->venue_description = $request->input('venue_description');
        $venue->venue_capacity = $request->input('venue_capacity');
        $venue->updated_by =  auth()->user()->id;

        if($request->file('venue_image')){
        $file = $request->file('venue_image');
        $filename = auth()->user()->id.time().'-'.$file->getClientOriginalName();
        $file->move(public_path('/VenueImage'), $filename);
        $venue->venue_image = $filename;
        }

        $venue->save();

        return redirect()->back()->with('success','Venue has been successfully updated!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
