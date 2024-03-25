<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chats;
use Carbon\Carbon;
use App\Models\orders;

class SupportController extends Controller
{
    public function index(Request $request) {
        $id = $request->id ? : NULL;
        $contacts = chats::select('chats.organiser_id','users.name','users.id','users.profile_img')
        ->leftJoin('users','chats.organiser_id','users.id')
        ->orderBy('chat_created')
        ->where('customer_id',auth()->user()->id)
        ->groupBy('chats.organiser_id','users.name','users.id','users.profile_img')
        ->get();

        $getexisting = chats::select('chats.organiser_id','users.name','users.id','users.profile_img')
        ->leftJoin('users','chats.organiser_id','users.id')
        ->orderBy('chat_created')
        ->where('customer_id',auth()->user()->id)
        ->groupBy('chats.organiser_id','users.name','users.id','users.profile_img')
        ->pluck('organiser_id');
        
        $organisers = orders::select('events.event_id')  
        ->leftJoin('events', 'orders.event_id', '=', 'events.event_id')
        ->whereNotIn('events.created_by', function($query) use ($getexisting) {
            $query->select('events.created_by')
                ->from('events')
                ->whereIn('events.created_by', $getexisting);
        })
        ->where('orders.created_by', auth()->user()->id) // Specify the table for created_by
        ->groupBy('events.event_id')
        ->get();
    

        if($id != NULL){        
            $chats = chats::where('organiser_id',$id)->where('customer_id',auth()->user()->id)->get();
        }
        else{
            $chats = [];
        }


        return view('Customer.mysupport',compact('contacts','chats','organisers'));
    }

    public function mysupportadmin(Request $request) {

        $id = $request->id ? : NULL;
        $contacts = chats::select('chats.customer_id','users.name','users.id','users.profile_img')
        ->leftJoin('users','chats.customer_id','users.id')
        ->orderBy('chat_created')
        ->where('organiser_id',auth()->user()->id)
        ->groupBy('chats.customer_id','users.name','users.id','users.profile_img')
        ->get();

        if($id != NULL){        
            $chats = chats::where('customer_id',$id)->where('organiser_id',auth()->user()->id)->get();
        }
        else{
            $chats = [];
        }


        return view('Admin.mysupport',compact('contacts','chats'));
    }


    

    public function reply($id,Request $request){

        $chat = new chats();
        $chat->message = $request->input('message');
        $chat->customer_id = auth()->user()->id;
        $chat->organiser_id = $id;
        $chat->sent_by = auth()->user()->id;
        $chat->chat_created = Carbon::now();
        $chat->first = 'N';
        $chat->save();
        return redirect()->back();
    }

    public function replyAdmin($id,Request $request){

        $chat = new chats();
        $chat->message = $request->input('message');
        $chat->customer_id = $id;
        $chat->organiser_id = auth()->user()->id;
        $chat->sent_by = auth()->user()->id;
        $chat->chat_created = Carbon::now();
        $chat->first = 'N';
        $chat->save();
        return redirect()->back();
    }

    public function startChat(Request $request){

        $id =$request->input('organiser_id');

        $chat = new chats();
        $chat->message = NULL;
        $chat->customer_id = auth()->user()->id;
        $chat->organiser_id = $id;
        $chat->sent_by = auth()->user()->id;
        $chat->chat_created = Carbon::now();
        $chat->first = 'Y';
        $chat->save();

        return redirect("mysupport?id=$id");
    }

    
}
