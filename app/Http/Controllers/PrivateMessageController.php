<?php

namespace App\Http\Controllers;
use App\User;
use App\Client;
use App\PrivateMessage;

use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    
    public function index(){
        if(auth()->check()){
            $message = PrivateMessage::where('user_id',auth()->id())->orderBy('created_at','desc')->get();
            return view('dashboard.contact.userprivatemessage',compact('message'));
        }    else{
            $message = PrivateMessage::where('client_id',auth()->guard('client')->id())->orderBy('created_at','desc')->get();
            return view('dashboard.contact.userprivatemessage',compact('message'));

        }
        
    }
    
    public function create($type,$user_id){
        $data =[
            'type' => $type,
            'user_id' => $user_id];
        return view('dashboard.private.create',compact('data'));
    }
    
    public function store(Request $request){
        $data = $this->validate($request,[
            'type' => 'required',
            'user_id' => 'required',    
            'subject' => 'required',    
            'message' => 'required',    
        ]);

    if($data['type'] == "admin"){
        $user = User::findorFail($data['user_id']);
        PrivateMessage::create([
        'subject' => $data['subject'],
        'message' => $data['message'],
        'user_id' => $data['user_id'],
        
        ]);
    }elseif($data['type'] == "client"){
        $user = Client::findorFail($data['user_id']);
        PrivateMessage::create([
        'subject' => $data['subject'],
        'message' => $data['message'],
        'client_id' => $data['user_id'],
        
        ]);
    }
    
   return back()->with('success','Message Sent.');
    
    }
    
      public function status($id){
        $item = PrivateMessage::findorfail($id);    
        if($item->status == 0){
            $item['status'] = 1;
            $item->update();
            return view('dashboard.contact.private-read-message',compact('item'));
        }
            return view('dashboard.contact.private-read-message',compact('item'));

    }
}
