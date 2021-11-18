<?php

namespace App\Http\Controllers;

use App\Client;
use App\Comment;
use App\Order;
use App\OtherProduct;
use App\Product;
use App\SellerMessage;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.access')->except('loginPage', 'login', 'register');
    }

    public function checkSeller()
    {
        // dd(request()->seller);
        $seller = User::role('seller')->where('mobile', request()->seller)->get();
        // $seller = User::role('seller')->where('email', request()->seller)->get();
        if (isset($seller) && count($seller) > 0) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function success()
    {
        return "Success";
    }

    public function failed()
    {
        return redirect()->route('home')->with('danger', 'payment failed');
        return "failed";
    }

    public function prodDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('client.product.productdetail', compact('product'));
        } else {
            $product = OtherProduct::where('slug', $slug)->first();
            return view('client.product.productdetail', compact('product'));
        }
    }

    public function index(Request $request)
    {
        // return 3;
        // return $request->cookie('email');

        $setting = Setting::where('status', 1)->first();
        $products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('product_id', '!=', null)->count();
        $other_products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('other_product_id', '!=', null)->count();
        $total_products = $products + $other_products;
        $total_comments = Comment::where('client_id', Auth::guard('client')->user()->id)->count();

        return view('client.dashboard', compact('setting', 'total_products', 'total_comments'));
    }

    public function loginPage()
    {
        return view('frontend.login');
    }

    public function login(Request $request)
    {
 
        // $client_Data = Client::where('email', $request->email)->firstorFail();

        // // $response = new Response();
        // // $response->withCookie(cookie()->forever('email', $request->email));
        // // return $response;
        // // return 3;
        // // return $request->cookie('email');
        // // if ($request->cookie('email') == $request->email) {
        //     // $data = $this->validate($request, [
        //     //     'email' => ['required', 'string'],
        //     //     'password' => ['required', 'string'],
        //     // ]);
        //     // $client_Data = Client::where('email', $request->email)->first();

        // // if($client_Data->loggedIn == 0){
        
        
        
        
        
        
        //     if ($client_Data && $client_Data->loggedIn == 0) {
        //     $credentials = $request->only('email', 'password');
        //     if (Auth::guard('client')->attempt($credentials, $request->remember)) {

        //         $client = Client::where('id', $client_Data->id)->first();
        //         $client['loggedIn'] = 1;
        //         $client->update();

        //         return redirect()->route('client.dashboard')->with('success', 'Successfully Logged In');
        //     } else {
        //         return redirect()->back()->with('danger', 'Email and Password Missmatched!');
        //     }
        //     // } else {
        //     //     return "you haveno any rights";
        //     // }
        // } else {
        //     return view('frontend.right-error');
        // }
        
        
        
        
        $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials, $request->remember)) {
    
            $client_Data = Client::where('email', $request->email)->first();
            
            if (!$client_Data && $client_Data->loggedIn != 0) {
                 return view('frontend.right-error');
            }
            
            $client = Client::where('id', $client_Data->id)->first();
            $client['loggedIn'] = 1;
            $client->update();

            return redirect()->route('client.dashboard')->with('success', 'Successfully Logged In');
        } else {
            return redirect()->back()->with('danger', 'Email and Password Mismatched!')->withInput($request->except('password'));
        }
        
        
    }


    public function logout(Request $request)
    {
        $client = Client::findorFail(Auth::guard('client')->user()->id);
        $client['loggedIn'] = 0;
        $client->update();
        $this->guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Successfully Logged Out');
    }



    public function register(Request $request)
    {

        // return $request->cookie('email');
        //this is for mac addresss
        // $MAC = exec('getmac');
        // $request['mac'] = strtok($MAC, ' ');
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => 'nullable|string',
            'mobile' => 'required|unique:clients',
            'password' => 'required|string',
        ]);
        // $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        // $response->withCookie('name', 'value', $minutes);
        // return $response;
        $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials, $request->remember)) {
            // $this->setCookies($request->email);
            $response = new Response(
                // redirect()->route('client.dashboard')->with('success', 'Successfully Logged In')
                Redirect::to('client-dashboard')
                    ->with('success', 'Successfully Logged In')
                // ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
            );
            $response->withCookie(cookie()->forever('email', $request->email));
            return $response;
            // return redirect()->route('client.dashboard')->with('success', 'Successfully Logged In');
        }
    }

    public function setCookies($email)
    {
        $response = new Response();
        $response->withCookie(cookie()->forever('email', $email));
        return $response;
    }

    public function myComments()
    {

        $comments = Comment::where('client_id', Auth::guard('client')->user()->id)->get();
        return view('client.review', compact('comments'));
    }

    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'loggedIn' => 1,
        ]);
    }


    protected function guard()
    {
        return Auth::guard();
    }

    public function paidCourse()
    {
        $products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('product_id', '!=', null)->get();
        $other_products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('other_product_id', '!=', null)->get();
        return view('client.list', compact('products', 'other_products'));
    }

    public function searchPaidOther()
    {
        $name = request('name');
        $other_products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('other_product_id', '!=', null)
            ->when($name, function ($q) use ($name) {
                return $q->whereHas('other_product', function ($query) use ($name) {
                    $query->where('name', 'LIKE', '%' . $name . '%');
                });
            })->get();

        return view('client.search.otherproduct', compact('other_products'));
    }

    public function searchPaidProd()
    {
        $name = request('name');
        $products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('product_id', '!=', null)
            ->when($name, function ($q) use ($name) {
                return $q->whereHas('product', function ($query) use ($name) {
                    $query->where('name', 'LIKE', '%' . $name . '%');
                });
            })->get();
            
        // $products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('product_id', '!=', null)
        //     ->with(['product' => function ($query) use ($name) {
        //         $query->where('name', 'LIKE', '%' . $name . '%');
        //     }])->get();



        return view('client.search.educational', compact('products'));
    }

    public function messageSeller()
    {
        $id = Auth::guard('client')->user()->id;
        $messages = SellerMessage::where('client_id', $id)->orderBy('id', 'desc')->paginate(5);

        foreach ($messages as $mesg) {
            $client = SellerMessage::findorFail($mesg->id);
            $client['status'] = 0;
            $client->update();
        }
        return view('client.sellerMessage', compact('messages'));
    }
}
