<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\events;
use App\Models\orders;
use App\Models\refund;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myevents =  events::withTrashed()->where('created_by',auth()->user()->id)->pluck('event_id');

        $orders = orders::where('payment_status','success')->whereIn('event_id',$myevents)->pluck('order_id');

        $refunds = refund::whereIn('order_id',$orders)->get();

        return view('Admin.refund',compact('refunds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function apvRefund($id)
    {
        $refunds = refund::where('id',$id)->first();
        $refunds->status = 'Approved';
        $refunds->save();

        orders::where('order_id',$refunds->order_id)->update([
            'refund' => '2'
        ]);

        $order =  orders::where('order_id',$refunds->order_id)->first();

        $url = request()->getSchemeAndHttpHost();

        \Mail::to($refunds->customer->email)->send(new \App\Mail\approvedRefund($order,$url,$refunds));

        return redirect()->back()->with('success','Refund request has been successfully Approved!');
    }

    public function rejRefund($id)
    {
        $refunds = refund::where('id',$id)->first();
        $refunds->status = 'Rejected';
        $refunds->save();

        orders::where('order_id',$refunds->order_id)->update([
            'refund' => '0'
        ]);

        $order =  orders::where('order_id',$refunds->order_id)->first();

        $url = request()->getSchemeAndHttpHost();

        \Mail::to($refunds->customer->email)->send(new \App\Mail\rejectedRefund($order,$url,$refunds));

        return redirect()->back()->with('success','Refund request has been successfully Rejected!');
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
