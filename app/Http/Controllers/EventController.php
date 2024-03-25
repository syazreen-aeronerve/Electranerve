<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\events;
use App\Models\Toyyibpay;
use App\Models\orders;
use App\Models\event_genre;
use Mpdf\Mpdf;
use App\Models\venue;
use App\Models\User;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fetchEvent(Request $request)
    {
        $data = events::withTrashed()->where('event_id',$request->id)->first();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function mypurchase()
    {
        $orders = orders::where('created_by',auth()->user()->id)->latest()->get();
        return view('Customer.mypurchase',compact('orders'));
    }

    public function bookingconfirmed($id)
    {
        $order = orders::where('order_id',$id)->first();
        return view('Customer.bookingconfirmed',compact('order'));
    }

    

    public function testing(){
        $orders = orders::where('order_id','7')->first();
        return view('test',compact('orders'));
    }

    public function printTicket($id)
    {
        $orders = orders::where('order_id',$id)->first();

        return view('Customer.ticket',compact('orders'));  
    }

    public function events(Request $request)
    {
        $pricerange = $request->pricerange;
		$location = $request->location;
		$organiser = $request->organiser;

        $genres = event_genre::orderBy('genre')->get();

        if($pricerange == ''){
        $events = events::where('event_date', '>=', now())->get();
        }
        else{
        $x = explode('-', $pricerange);

        $pricefrom = isset($x[0]) ? intval($x[0]) : null;
        $priceto = isset($x[1]) ? intval($x[1]) : null;

        $events = events::where('event_date', '>=', now())
        ->where('event_ticket_price', '>=', $pricefrom)
        ->where('event_ticket_price', '<=', $priceto)
        ->where('event_venue', $location)
        ->where('created_by', $organiser)
        ->get();

        }

        $venues = venue::all();
        $organisers = User::where('role','Event Organiser')->where('status','A')->get();

        return view('Customer.events',compact('genres','events','venues','organisers','pricerange','location','organiser'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');

        if($type == 'C'){
        $events = new events;
        $events->event_name = $request->input('event_name');
        $events->event_date = $request->input('event_date');
        $events->event_time = $request->input('event_time');
        $events->event_venue = $request->input('event_venue');
        $events->genre = $request->input('genre');
        $events->event_ticket_price = $request->input('event_ticket_price');
        $events->event_earlybird_discount = $request->input('event_earlybird_discount');
        $events->event_earlybird_discount_end_date = $request->input('event_earlybird_discount_end_date');
        $events->event_earlybird_discount_end_time = $request->input('event_earlybird_discount_end_time');
        $events->event_description = $request->input('event_description');
        $events->event_total_ticket = $request->input('event_total_ticket');
        $events->event_duration_hours = $request->input('event_duration_hours');
        $events->created_by =  auth()->user()->id;
        $events->updated_by =  auth()->user()->id;

        $file = $request->file('event_image');
        $filename = auth()->user()->id.time().'-'.$file->getClientOriginalName();
        $file->move(public_path('/EventImage'), $filename);

        $events->event_image = $filename;

        $events->save();

        return redirect()->back()->with('success','Event has been successfully added!');
        }
        else{
        $events = events::where('event_id',$id)->first();
        $events->event_name = $request->input('event_name');
        $events->event_date = $request->input('event_date');
        $events->event_time = $request->input('event_time');
        $events->event_venue = $request->input('event_venue');
        $events->genre = $request->input('genre');
        $events->event_ticket_price = $request->input('event_ticket_price');
        $events->event_earlybird_discount = $request->input('event_earlybird_discount');
        $events->event_earlybird_discount_end_date = $request->input('event_earlybird_discount_end_date');
        $events->event_earlybird_discount_end_time = $request->input('event_earlybird_discount_end_time');
        $events->event_description = $request->input('event_description');
        $events->event_total_ticket = $request->input('event_total_ticket');
        $events->event_duration_hours = $request->input('event_duration_hours');
        $events->updated_by =  auth()->user()->id;

        if($request->file('event_image')){
            $file = $request->file('event_image');
            $filename = auth()->user()->id.time().'-'.$file->getClientOriginalName();
            $file->move(public_path('/EventImage'), $filename);
            $events->event_image = $filename;
        }

        $events->save();

        return redirect()->back()->with('success','Event has been successfully updated!');
    }
    }

    public function removeEvent($id){
        events::where('event_id',$id)->delete();

        return redirect()->back()->with('success','Event has been successfully deleted!');
    }

    /**
     * Display the specified resource.
     */
    public function returnPayment($id,Request $request)
    {

    $order = orders::where('order_id',$id)->first();
    $order->payment_status = $request->status_id == 1 ? 'Success' : 'Failed';
    $order->transaction_id = $request->transaction_id;
    $order->billcode = $request->billcode;
    $order->save();

    if( $request->status_id == 1){

    $url = request()->getSchemeAndHttpHost();

    $getOrganiserEmail = User::where('id',$order->events->created_by)->first();
    
    \Mail::to(auth()->user()->email)->send(new \App\Mail\purchaseConfirmation($order,$url));
    \Mail::to($getOrganiserEmail->email)->send(new \App\Mail\newPurchase($order,$url));
    
    return redirect("bookingconfirmed/$id")->with('success','Event has been successfully booked!');
    
    }
    else{
    $event = events::withTrashed()->where('event_id',$order->event_id )->first();


    $latesttotal = $event->event_total_ticket + $order->quantity;

    $event->event_total_ticket =   $latesttotal;
    $event->save();



    return redirect('/customer-home')->with('error','Whoops! Payment Failed! Please try again!');   
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function viewEvent($id)
    {
        $event = events::where('event_id',$id)->first();
        $relatedevents = events::where('genre',$event->genre)->where('event_id','!=',$id)->get();

        return view('Customer.viewEvent',compact('event','relatedevents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function checkout(Request $request)
    {
        $quantity =  $request->input('quantity');
        $totalprice =  $request->input('totalprice');
        $id =  $request->input('id');

        $event = events::withTrashed()->where('event_id',$id)->first();

        return view('Customer.checkout',compact('event','quantity','totalprice'));
    }

    /**
     * Remove the specified resource from storage.
     */

     public function formatAmount($amt)
     {

         $amt = str_replace(',', '', $amt);
         

         $formattedAmount = number_format((float)$amt, 2, '.', '');
      
 
         return $formattedAmount;
     }
     
    public function paynow(Request $request)
    {
        $amt = $request->input('totalprice'); 
        

        $formattedAmt = $this->formatAmount($amt);


        $orders = new orders;
        $orders->event_id = $request->input('id');
        $orders->quantity = $request->input('quantity');
        $orders->total_price = $formattedAmt;
        $orders->payment_status = 'Pending';
        $orders->first_name = $request->input('first_name');
        $orders->last_name = $request->input('last_name');
        $orders->email = $request->input('email');
        $orders->address = $request->input('address');
        $orders->phone = $request->input('phone');
        $orders->created_by = auth()->user()->id;
        $orders->updated_by = auth()->user()->id;
        $orders->save();

        


        $toyyibpay_secret_key = '7t8ifiif-wgy0-63wj-h3ts-qpqjq4cnivn1';
        $category_code = 'do7fwfol';
        $paymentGateway = new ToyyibPay($toyyibpay_secret_key);

        $baseurl = 'http://127.0.0.1:8000';

        $event = events::withTrashed()->where('event_id',$orders->event_id )->first();


        $latesttotal = $event->event_total_ticket - $orders->quantity;

        $event->event_total_ticket =   $latesttotal;
        $event->save();

        $id = $orders->order_id;


        $bill = $paymentGateway->createBill( $category_code, auth()->user()->name, $event->event_name, $id )
                                ->payer( auth()->user()->name, $orders->email, $orders->phone)
                                ->amount( $formattedAmt )
                                ->chargeToCustomer( 2 )
                                ->callbackUrl( "{$baseurl}/returnPayment/$id")
                                ->emailContent( 'Thank you for your Payment!' );
        
                                echo $bill->redirectToPaymentUrl();
    }
}
