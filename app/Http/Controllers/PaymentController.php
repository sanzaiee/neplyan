<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OtherProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.access');
    }
    public function mode($productslug)
    {
        $product = Product::where('slug', $productslug)->first();
        $pid = "P-id" .  Str::random(5);
        if ($product) {
            return view('frontend.payment.paymentMode', compact('product', 'pid'));
        } else {
            $product = OtherProduct::where('slug', $productslug)->first();
            return view('frontend.payment.paymentMode', compact('product', 'pid'));
        }
    }

    public function success(Request $request)
    {
        if (isset($request->oid) && isset($request->amt) && isset($request->refId)) {
            $order = Order::where('pid', $request->oid)->first();
            if ($order) {
                $url = "https://uat.esewa.com.np/epay/transrec";
                $data = [
                    'amt' => $order->amount,
                    'rid' => $request->refId,
                    'pid' => $order->pid,
                    'scd' => 'EPAYTEST'
                ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);

                $response_code = $this->get_xml_node_val('response_code', $response);
                if (trim($response_code) == 'Success') {
                    $order->update([
                        'status' => 1
                    ]);

                    return redirect()->route('home')->with('success', 'payment successful');
                    // return redirect()->route('success.response')->with('success', 'payment successful');
                }
            } else {
                return redirect()->route('home')->with('danger', 'payment failed');
                // return redirect()->route('fail.response')->with('danger', 'payment failed');
                return $request->oid;
            }
        }
    }

    public function successful()
    {
        return "success";
    }

    public function fail()
    {
        return "fail";
    }

    public function get_xml_node_val($node, $xml)
    {
        if ($xml == false) {
            return false;
        }
        $found = preg_match('#<' . $node . '(?:\s+[^>]+)?>(.*?)' . '</' . $node . '>#s', $xml, $matches);
        if ($found != false) {
            return $matches[1];
        }
        return false;
    }
}
