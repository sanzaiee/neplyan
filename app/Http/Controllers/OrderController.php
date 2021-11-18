<?php

namespace App\Http\Controllers;

use App\Order;
use App\OtherProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index(){
        $order = Order::where('status',1)->get();
        return view('dashboard.order.list',compact('order'));
    }
    
    public function store(Request $request)
    {
        // $seller = User::role('seller')->where('email', request()->seller)->get();
        $seller = User::role('seller')->where('email', $request->seller)->first();
        if ($seller) {
            $sellerId = $seller->id;
        } else {
            $sellerId = null;
        }
        if ($request->seller) {
        }
        $client = Auth::guard('client')->user()->id;
        if ($client) {
            $otherproduct = OtherProduct::where('slug', $request->pslug)->first();
            // return $request;
            if ($otherproduct) {

                if ($request->discount_status == 1) {
                    $amt = $otherproduct->price - 0.15 * $otherproduct->price;
                } else {
                    $amt = $otherproduct->price;
                }

                Order::create([
                    'seller_id' => $sellerId,
                    'client_id' => $client,
                    'other_product_id' => $request->id,
                    'amount' => $amt,
                    // 'amount' => $otherproduct->price,
                    'paymode' => 1,
                    'pid' => $request->pid,
                ]);
            } else {
                $product = Product::where('slug', $request->pslug)->first();

                if ($request->discount_status == 1) {
                    $amt = $product->price - 0.15 * $product->price;
                } else {
                    $amt = $product->price;
                }
                Order::create([
                    'seller_id' => $sellerId,
                    'amount' => $amt,
                    // 'amount' => $product->price,
                    'client_id' => $client,
                    'product_id' => $request->id,
                    'paymode' => 1,
                    'pid' => $request->pid,
                ]);
            }
            return "successfully saved";
        }
        return "failed";
    }
}
