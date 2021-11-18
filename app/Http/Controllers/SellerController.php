<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:browse_clients')->only('totalClient');
        $this->middleware('permission:browse_sale')->only(['totalSale']);
    }


    public function totalSale()
    {
       $totalSales = Order::where('seller_id', auth()->user()->id)->where('product_id','!=',null)->where('status', 1)->get()->groupBy('product_id')->map(function($item){
           return $item->count();
       })->all();
      
        
       $totalSalesOther = Order::where('seller_id', auth()->user()->id)->where('other_product_id','!=',null)->where('status', 1)->get()->groupBy('other_product_id')->map(function($item){
            return $item->count();
        })->all();
        
        return view('dashboard.seller.salelist', compact('totalSales','totalSalesOther'));
    }


    public function totalClient()
    {
        $clients = Order::where('seller_id', auth()->user()->id)->where('status', 1)->pluck('client_id')->unique();
        $totalUsers = Client::wherein('id', $clients)->get();
        return view('dashboard.seller.clientlist', compact('totalUsers'));
    }
}
