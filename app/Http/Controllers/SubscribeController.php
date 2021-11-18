<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.access')->except('store');
    }
    
    
    public function clientList(){
        $title = "Subscriber List";
        $subscribers = Client::all();

        return view('dashboard.client.list', compact('subscribers', 'title'));
    }

    public function subscribeCourseList($id){
        $products = Order::where('client_id', $id)->where('status', 1)->where('product_id', '!=', null)->get();
        $other_products = Order::where('client_id', $id)->where('status', 1)->where('other_product_id', '!=', null)->get();
        
        $user = Client::findorFail($id);
        return view('dashboard.client.courselist', compact('products', 'other_products','user'));
    }
    
    
    public function index()
    {
        $title = "Subscriber List";
        $subscribers = Subscribe::all();

        return view('dashboard.subscribe.index', compact('subscribers', 'title'));
    }
    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'email' => 'required|email|unique:subscribes',
        ]);

        Subscribe::create($data);
        $request->session()->flash('success', 'Subscribed');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $tag = Subscribe::findorFail($id);
        $tag->delete();
        session()->flash('danger', 'Deleted Successfully');
        return redirect()->back();
    }
    
    public function destroyClient($id){
    
        $tag = Client::findorFail($id);
        $tag->delete();
        session()->flash('danger', 'Deleted Successfully');
        return redirect()->back();
        }
}
