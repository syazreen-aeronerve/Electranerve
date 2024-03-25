<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event_genre;
use App\Models\events;
use App\Models\orders;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Models\refund;
use App\Models\feedback;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use App\Models\newsletterlogs;

use Illuminate\Support\Facades\Hash; 

class HomeController extends Controller
{
    public function index(){

        $genres = event_genre::orderBy('genre')->get();
        $events = events::where('event_date', '>=', now())->get();

        $currentWeek = Carbon::now()->weekOfYear;

        $checkNewsletterLogs = newsletterlogs::where('customer_id',auth()->user()->id)->where('week',$currentWeek)->count();

        if(auth()->user()->newsletter == 'Y' && $checkNewsletterLogs <= 0){
        Artisan::call('send:newsletter');
        }

        $feedbacks = feedback::latest()->get();



        return view('Customer.home',compact('genres','events','feedbacks'));
    }

    public function faq(){

        return view('Customer.faq');
    }

    public function profile(){
        $orders = orders::where('created_by',auth()->user()->id)->where('payment_status','Success')->latest()->get();

        return view('Customer.profile',compact('orders'));
    }

    public function updProfilecust(Request $request){
        
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

    public function changepasscust(Request $request)
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

    public function updnewsletter(Request $request){


        if($request->input('newsletter')){
            $newsletter = 'Y';
        }
        else{
            $newsletter = 'N';
        }
        
        User::where('id',auth()->user()->id)->update([
            'newsletter' => $newsletter
        ]);

        return redirect()->back()->with('success','Email setting has been successfully updated!');
    }

    public function requestRefund(Request $request){

        $id = $request->input('id');
        $refund_amount = $request->input('refund_amount');
        $reason = $request->input('reason');

        $refund = new refund;
        $refund->order_id = $id;
        $refund->refund_amount = $refund_amount;
        $refund->reason = $reason;
        $refund->status = 'Pending';
        $refund->customer_id = auth()->user()->id;

        if($request->hasFile('evidence')){
    		$avatar = $request->file('evidence');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();

            $avatar->move(public_path('RefundEvidence'), $filename);

            $refund->evidence = $filename;
    	}

        $refund->save();

        orders::where('order_id',$id)->update([
            'refund' => '1'
        ]);

        $order = orders::where('order_id',$id)->first();

        $url = request()->getSchemeAndHttpHost();

        $getOrganiserEmail = User::where('id',$order->events->created_by)->first();
        
        \Mail::to($getOrganiserEmail->email)->send(new \App\Mail\newRefund($order,$url,$refund));

        return redirect()->back()->with('success','Request for refund has been successfully sent!');
    }

    public function myrefund(){
        $refunds = refund::where('customer_id',auth()->user()->id)->latest()->get();

        return view('Customer.myrefund',compact('refunds'));
    }

    public function Postfeedback(Request $request){

  $order_id = $request->input('order_id');

        $rating = $request->input('rating');
        $feedbacks = $request->input('feedback');


        $feedback = new feedback;
        $feedback->order_id = $order_id;
        $feedback->customer_id = auth()->user()->id;
        $feedback->star = $rating;
        $feedback->feedback = $feedbacks;
        $feedback->save();

        orders::where('order_id',$order_id)->update([
            'feedback' => 'Y'
        ]);

        return redirect()->back()->with('success','Thank you for your Feedback!');
    }

    public function subsnewsletter(){

        User::where('id',auth()->user()->id)->update([
            "newsletter" => "Y"
        ]);

        return redirect()->back();
    }
    
    
    

    
    
}
