<?php

namespace App\Http\Controllers;

use App\Education;
use App\Level;
use App\Material;
use App\Order;
use App\Other;
use App\OtherProduct;
use App\OtherTopic;
use App\Product;
use App\Semester;
use App\Setting;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{

    public function index()
    {
        
        $setting = Setting::where('status', 1)->first();
        $education = Education::where('status', 1)->get();
        $others = Other::where('status', 1)->get();
        if (Auth::check()) {
            $products = Product::where('status', 1)->where('approve', 1)->get();
            $totalSales = Order::where('seller_id', auth()->user()->id)->where('status', 1)->count();
            $totalUser = Order::where('seller_id', auth()->user()->id)->where('status', 1)->pluck('client_id')->unique()->count();

            return view('dashboard.dashboard', compact('setting', 'education', 'products', 'others', 'totalSales', 'totalUser'));

        } elseif (Auth::user()->is_super_admin == 0) {
            
           
            $products = Product::where('status', 1)->where('approve', 1)->where('user_id', Auth::user()->id)->get();
            $totalSales = Order::where('seller_id', auth()->user()->id)->where('status', 1)->count();
            return view('dashboard.vendor.vendorDash', compact('setting', 'education', 'products', 'others', 'totalSales'));
        }
    }

    public function systemLoginPage()
    {
        $setting = Setting::where('status', 1)->first();
        return view('dashboard.login', compact('setting'));
    }

    public function productSearch(Request $request)
    {
        $data = $this->validate($request, [
            'education_id' => 'required',
        ]);
        // return $request['level_id'];
        if ($request['material_id'] == 0) {
            // return $request['education_id'];
            $education = Education::findorFail($request['education_id']);
            // return $education->slug;
            return redirect()->route('add.material', $education->slug);
        } elseif ($request['level_id'] == 0) {
            // return $request['material_id'];
            $material = Material::findorFail($request['material_id']);
            return redirect()->route('add.level', $material->slug);
            return $material->slug;
        } elseif ($request['semester_id'] == 0) {
            // return $request['level_id'];
            $level = Level::findorFail($request['level_id']);
            return redirect()->route('add.semester', $level->slug);
            return $level->slug;
        } elseif ($request['product_id'] == 0) {
            $semester = Semester::findorFail($request['semester_id']);
            return redirect()->route('add.product', $semester->slug);
            return $semester->slug;
        } elseif ($request['topic_id'] == 0) {
            $product = Product::findorFail($request['product_id']);
            return redirect()->route('add.topic', $product->slug);
        } else {
            $topic = Topic::findorFail($request['topic_id']);
            return redirect()->route('add.topic.content', $topic->slug);
        }
    }

    public function otherProductSearch(Request $request)
    {
        $data = $this->validate($request, [
            'other_id' => 'required',
        ]);
        if ($request->product_id == 0) {

            // return $request->other_id;

            return redirect()->route('other.product.create.id', $request->other_id);
            $products = OtherProduct::where('other_id', $data['other_id'])->where('status', 1)->where('approve', 1)->get();
        } else {
            $product = OtherProduct::findorFail($request->product_id);

            // $headings = OtherTopic::where('other_product_id', $product->id)->where('status', 1)->get();
            // return view('dashboard.otherproduct.add-content', compact('product', 'headings'));

            return redirect()->route('add.other.topic', $product->slug);
        }
    }

    public function vendorList()
    {
        $users = User::role(['employee', 'seller', 'SuperAdmin'])->get();
        $employee = User::role(['employee'])->get();
        $seller = User::role(['seller'])->get();
        $admin = User::role(['SuperAdmin'])->get();
        return view('dashboard.vendorlist', compact('users','employee','seller','admin'));
    }

    public function changeStatus()
    {
        $user = User::findorFail(request()->id);
        $user['status'] = !$user['status'];
        $user->update();
        return "yes";
    }

    public function vendorById($id)
    {
        $products = Product::where('user_id', $id)->get();
        $other_products = OtherProduct::where('user_id', $id)->get();
        // $allproducts = $products->merge($other_products);
        return view('dashboard.vendorproductlist', compact('products', 'other_products'));
    }

    public function approval($slug)
    {
        $data = Product::where('slug', $slug)->first();
        if ($data) {
            $data['approve'] = !$data['approve'];
            $data->update();
        } else {
            $data = OtherProduct::where('slug', $slug)->first();
            $data['approve'] = !$data['approve'];
            $data->update();
        }

        return redirect()->back()->with('Approval Status Changed Successfully');
    }


    public function userLogout()
    {
        return 3;
        Auth::guard('web')->logout();
        return redirect(route('login'));
    }
}
