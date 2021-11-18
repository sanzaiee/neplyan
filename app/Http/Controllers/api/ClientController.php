<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;

use App\Client;
use App\ClientProfile;
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
        // $this->middleware('client.access')->except('loginPage', 'login', 'register');
    }

    public function checkSeller()
    {
        $seller = User::role('seller')->where('email', request()->seller)->get();
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
        
        $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials, $request->remember)) {
    
            $client_Data = Client::where('email', $request->email)->first();
            
            if ($client_Data && $client_Data->loggedIn == 1) {
                return response()->json(['message' => 'Logged in failed... duplicate login!!', 'code' => '301']);
            }
            
            $client = Client::where('id', $client_Data->id)->first();
            $client['loggedIn'] = 1;
            $client->update();

                return response()->json(['message' => 'Successfully Logged In!!', 'code' => '200' ,'user_id' => $client->id]);
        } else {
                return response()->json(['message' => 'Email and Password Mismatched!', 'code' => '301']);
        }
        
        
    }

    
    public function clientById($id){
        $client = Client::findorFail($id);
        return response()->json(['data' => $client, 'code' => '200']);
    
    }
    
    public function clientProfileById($id){
        $client_profile = ClientProfile::findorFail($id);
        return response()->json(['client_profile' => $client_profile, 'code' => '200']);
    }


    public function logout(Request $request)
    {
        $client = Client::findorFail($request->id);
        $client['loggedIn'] = 0;
        $client->update();
        $this->guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return response()->json(['message' => 'Successfully Logged Out!!', 'code' => '200']);
    }



    public function register(Request $request)
    {
        $exist = Client::where('email',$request->email)->first();
        if($exist){
            return response()->json(['message' => 'Duplicate Email Entry!! Please try with different Email.', 'code' => '301']);

        }
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => 'nullable|string',
            'mobile' => 'required',
            'password' => 'required|string',
        ]);

        $data['password'] = bcrypt($request->password);
        
        $user = Client::create($data);

       $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials, $request->remember)) {
            return response()->json(['message' => 'Successfully Registerd!', 'code' => '200']);
        }else{
            return response()->json(['message' => 'Failed to Register!', 'code' => '301']);
        }

    }

    public function setCookies($email)
    {
        $response = new Response();
        $response->withCookie(cookie()->forever('email', $email));
        return $response;
    }

    public function myComments($id)
    {
        $comments = Comment::where('client_id', $id)->get();
        return response()->json([
            'comments' => $comments,
            'success' =>'200'
        ]);
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
        $products = Order::where('client_id', Auth::guard('client')
                    ->user()->id)
                    ->where('status', 1)->where('product_id', '!=', null)
                    ->when($name, function ($q) use ($name) {
                        return $q->whereHas('product', function ($query) use ($name) {
                            $query->where('name', 'LIKE', '%' . $name . '%');
                        });
                    })
                    ->get();
                    
                    
        // $products = Order::where('client_id', Auth::guard('client')->user()->id)->where('status', 1)->where('product_id', '!=', null)
        //     ->with(['product' => function ($query) use ($name) {
        //         $query->where('name', 'LIKE', '%' . $name . '%');
        //     }])->get();



        return view('client.search.educational', compact('products'));
    }

    public function messageSeller($id)
    {
        $messages = SellerMessage::where('client_id', $id)->get();

        foreach ($messages as $mesg) {
            $client = SellerMessage::findorFail($mesg->id);
            $client['status'] = 0;
            $client->update();
        }
        
        return response()->json([
            'comments' => $comments,
            'success' =>'200'
        ]);
    }
}
