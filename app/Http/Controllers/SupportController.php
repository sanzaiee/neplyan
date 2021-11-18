<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support;
class SupportController extends Controller
{
    public function index(){
        $clients = Support::where('client_id','!=',null)->get();
        $sellers = Support::where('seller_id','!=',null)->get();

        return view('dashboard.support.index',compact('clients','sellers'));
    }
    
    
    public function create(){
        return view('dashboard.support.create');
    }
    
    
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        
        if(auth()->guard('client')->check()){
          $data['client_id'] = auth()->guard('client')->id();

        }else{
             $data['seller_id'] = auth()->id();
        }
        
        Support::create($data);
        return back()->with('success', 'Message Sent');
    }
    
    public function status($id){
        $item = Support::findorfail($id);    
        if($item->status == 0){
            $item['status'] = 1;
            $item->update();
            return view('dashboard.contact.read-message',compact('item'));
        }
            return view('dashboard.contact.read-message',compact('item'));

    }
}
