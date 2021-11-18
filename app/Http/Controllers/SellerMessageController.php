<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\User;
use App\SellerMessage;
use Illuminate\Http\Request;

class SellerMessageController extends Controller
{
    public function emailClient()
    {
        $clients = Order::where('seller_id', auth()->user()->id)->where('status', 1)->pluck('client_id')->unique();
        $totalUsers = Client::wherein('id', $clients)->get();

        return view('dashboard.seller.email', compact('totalUsers'));
    }

    public function send(Request $request)
    {
        
        $data = $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'mailto' => 'required',

        ]);
        
        if($data['mailto'] == "seller"){
            
            $users = User::role('seller')->get(); // Returns only users with the role 'seller'

            foreach ($users as $mesg) {
                // $data['client_id'] = $mesg->id;
                $data['seller_id'] = $mesg->id;
    
                SellerMessage::create($data);
            }

        
        }
        elseif($data['mailto'] == "employee"){
            $users = User::role('employee')->get(); // Returns only users with the role 'employee'
            
            foreach ($users as $mesg) {
            // $data['client_id'] = $mesg->id;
            // $data['seller_id'] = auth()->user()->id;
            $data['seller_id'] = $mesg->id;
            
            SellerMessage::create($data);
            }        
            
        }
        
        elseif($data['mailto'] == "user"){
            $users = Client::all(); // Returns only users with the role 'employee'
            
            foreach ($users as $mesg) {
            $data['client_id'] = $mesg->id;
            // $data['seller_id'] = auth()->user()->id;
            
            SellerMessage::create($data);
            }        
            
        }else{
            
            return back()->with('danger','Please select field mailto!!')->withInput();
        }
    
        
        // $clients = Order::where('seller_id', auth()->user()->id)->where('status', 1)->pluck('client_id')->unique();
        // $totalUsers = Client::wherein('id', $clients)->get();

        // foreach ($totalUsers as $mesg) {
        //     $data['client_id'] = $mesg->id;
        //     $data['seller_id'] = auth()->user()->id;

        //     SellerMessage::create($data);
        // }

        return redirect()->back()->with('success', 'Message Sent Successfully');
    }

    public function outbox()
    {
        $messages = SellerMessage::where('seller_id', auth()->id())->get();

        return view('dashboard.seller.sentbox', compact('messages'));
    }
    
    
     public function messageAdmin()
    {
        $id = auth()->user()->id;
        $message = SellerMessage::where('seller_id', $id)->where('status',0)->get();

        foreach ($message as $mesg) {
            $client = SellerMessage::findorFail($mesg->id);
            $client['status'] = 1;
            $client->update();
        }
        
        $messages = SellerMessage::where('seller_id', $id)->where('status',1)->orderBy('created_at','desc')->paginate(5);

        return view('dashboard.vendor.adminMessage', compact('messages'));
    }
    
    
}
