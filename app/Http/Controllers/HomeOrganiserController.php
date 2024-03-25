<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\event_genre;
use Illuminate\Http\Request;
use App\Models\venue;
use App\Models\events;
use App\Models\feedback;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use App\Rules\MatchOldPassword;
use App\Models\orders;
use Mpdf\Mpdf;
use Carbon\Carbon;

class HomeOrganiserController extends Controller
{
    public function index(){

        $myevents = Events::withTrashed()->where('created_by', auth()->user()->id)->pluck('event_id');


        $totalrevenue = Orders::where('payment_status', 'success')
            ->whereIn('event_id', $myevents)
            ->whereYear('created_at', now()->year) // Use the current year
            ->sum('total_price');

        $totalsold = Orders::where('payment_status', 'success')
            ->whereIn('event_id', $myevents)
            ->sum('quantity');

        $totalevent = Events::withTrashed()->where('created_by', auth()->user()->id)->count();

        $totalcustomer = orders::where('payment_status', 'success')
        ->whereIn('event_id', $myevents) 
        ->groupBy('created_by')
        ->distinct('created_by')
        ->count();


        return view('Admin.home',compact('totalrevenue','totalsold','totalevent','totalcustomer'));
    }

    public function fetchChartData()
    {
        $myevents = Events::withTrashed()->where('created_by', auth()->user()->id)->pluck('event_id');
    
        $data = [
            'labels' => [],
            'data' => [],
        ];
    
        // Generate labels and data for each month
        for ($month = 1; $month <= 12; $month++) {
            $totalPrice = Orders::where('payment_status', 'success')
                ->whereIn('event_id', $myevents)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year) // Use the current year
                ->sum('total_price');
    
            $data['labels'][] = Carbon::create()->month($month)->format('M');
            $data['data'][] = $totalPrice;
        }
    
        return response()->json($data);
    }

    public function ordermanagement(){

        $myevents =  events::withTrashed()->where('created_by',auth()->user()->id)->pluck('event_id');

        $orders = orders::where('payment_status','success')->whereIn('event_id',$myevents)->get();

        return view('Admin.orders',compact('orders'));
    }

    public function review(){

        $myevents =  events::withTrashed()->where('created_by',auth()->user()->id)->pluck('event_id');

        $orders = orders::where('payment_status','success')->whereIn('event_id',$myevents)->pluck('order_id');

        $reviews = feedback::whereIn('order_id',$orders)->get();


        return view('Admin.review',compact('reviews'));
    }

    public function announcementmanagement(){

        $announcements =  announcement::where('created_by',auth()->user()->id)->latest()->get();


        return view('Admin.announcement',compact('announcements'));
    }

    

    public function fetchOrder(Request $request)
    {
        $data = orders::where('order_id',$request->id)->first();

        return response()->json($data);
    }

    


    public function venuemanagement(){
        
        $venues = venue::where('created_by',auth()->user()->id)->latest()->get();

        return view('Admin.venue-index',compact('venues'));
    }

    public function eventsmanagement(){
        
        $events = events::where('created_by',auth()->user()->id)->latest()->get();
        $venues = venue::where('created_by',auth()->user()->id)->latest()->get();
        $genres = event_genre::all();

        return view('Admin.events-index',compact('events','venues','genres'));
    }

    public function profile(){

        return view('Admin.profile');
    }


    public function salesreport(){

        $myevents = events::withTrashed()->where('created_by', auth()->user()->id)->get();

        $orders = [];
        $grandtotal = 0;
        
        foreach ($myevents as $event) {
        
            $totalamount = orders::
                where('payment_status', 'success')
                ->where('event_id', $event->event_id)
                ->sum('total_price');
        
            $totalsold = orders::
                where('payment_status', 'success')
                ->where('event_id', $event->event_id)
                ->sum('quantity');

            $grandtotal += $totalamount;
        
            // Create an object for each event
            $order = (object) [
                'name' => $event->event_name,
                'totalamount' => $totalamount,
                'totalsold' => $totalsold,
            ];
        
            // Add the event's information to the $orders array
            $orders[] = $order;
        }

        

        return view('Admin.salesreport',compact('orders','grandtotal'));
    }

    public function printSP(){

        $myevents = Events::withTrashed()->where('created_by', auth()->user()->id)->get();
        $orders = [];
        $grandtotal = 0;

        foreach ($myevents as $event) {
            $totalamount = Orders::where('payment_status', 'success')
                ->where('event_id', $event->event_id)
                ->sum('total_price');

            $totalsold = Orders::where('payment_status', 'success')
                ->where('event_id', $event->event_id)
                ->sum('quantity');

            $grandtotal += $totalamount;

            $order = (object) [
                'name' => $event->event_name,
                'totalamount' => $totalamount,
                'totalsold' => $totalsold,
            ];

            $orders[] = $order;
        }

        // Start PDF generation using mPDF
        $mpdf = new Mpdf();

 
$html = '<html>
<title>Sales Report</title>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot th {
            text-align: right;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 60px;
            max-height: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="images/electranerve.png" alt="System Logo" class="logo">
        <h2>ElectraNerve</h2>
    </div>
    <h2>Sales Report to the date - ' . now()->format('d/m/Y') . '</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Event</th>
                <th>Total Ticket Sold</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>';

foreach ($orders as $key => $order) {
$html .= '<tr>
    <td>' . ++$key . '</td>
    <td>' . $order->name . '</td>
    <td>' . $order->totalsold . '</td>
    <td>RM ' . number_format($order->totalamount, 2) . '</td>
</tr>';
}

$html .= '</tbody>
    <tfoot>
        <tr>
            <th colspan="3" style="text-align: right;">Total Sales:</th>
            <th style="font-size: 18px;">RM ' . number_format($grandtotal, 2) . '</th>
        </tr>
    </tfoot>
</table>
</body>
</html>';




        $mpdf->WriteHTML($html);

        // Download the PDF
        $mpdf->Output('salesreport.pdf', 'I');
    }

    

    

    public function updProfileadmin(Request $request){
        
        User::where('id',auth()->user()->id)->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
        ]);

        if($request->hasFile('profile_img')){
    		$avatar = $request->file('profile_img');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();

            $avatar->move(public_path('images/profile-imgs'), $filename);

            User::where('id',auth()->user()->id)->update([
                'profile_img' => $filename,
            ]);
    	}

        return redirect()->back()->with('success','Profile has been successfully updated!');
    }

    public function changepassadmin(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        $user = User::find(auth()->user()->id);
		$user->update(['password'=> $request->new_password]);
		$user->password = Hash::make($request->input('new_password'));
        $user->save();
   
        return redirect()->back()->with('success', "Password has been changed successfully! ");
    }

    public function postAnnouncement(Request $request)
    {
        $announcement = new announcement();
		$announcement->title = $request->input('title');
        $announcement->announcement = $request->input('announcement');
        $announcement->created_by = auth()->user()->id;
        $announcement->save();
   
        return redirect()->back()->with('success', "Announcement has been saved successfully! ");
    }

    public function removeAnnouncement($id)
    {
        announcement::where('id',$id)->delete();
   
        return redirect()->back()->with('success', "Announcement has been saved removed! ");
    }

    


    

    


    

    
}
