<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\events;
use Illuminate\Http\Request;
use App\Models\orders;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = orders::where('created_by',auth()->user()->id)->pluck('event_id');

        $getevents = events::whereIn('event_id',$orders)->pluck('created_by');

        $announcements = announcement::whereIn('created_by',$getevents)->latest()->get();

        return view('Customer.announcement',compact('announcements'));
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
        //
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
