<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;

use App\Client;
use App\Comment;
use App\Banner;
use App\Guideline;
use App\Education;
use App\Order;
use App\Other;
use App\OtherProduct;
use App\Product;
use App\SellerMessage;
use App\Setting;
use App\User;
use App\Material;
use App\Level;
use App\Semester;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('client.access')->except('loginPage', 'login', 'register');
    }
    
    
     public function paidCourse($id)
    {
        $products = Order::where('client_id', $id)->where('status', 1)->where('product_id', '!=', null)->with('product')->get();
        $other_products = Order::where('client_id', $id)->where('status', 1)->where('other_product_id', '!=', null)->with('other_product')->get();
        return response()->json(['products' => $products,
        'other_products' => $other_products,
        'code' => '200']);

        // return view('client.list', compact('products', 'other_products'));
    }
    
     public function readProductClient($slug)
    {
        $mesgs = SellerMessage::where('client_id', auth()->id())->where('status', 1)->get();
        $setting = Setting::where('status', 1)->first();
        $product = Product::where('slug', $slug)->with('topic')->first();
        if (!$product) {
        
            $product = OtherProduct::where('slug', $slug)->with('other_topic')->first();
            $pagecount = $product->other_topic->where('page_status',1)->count();
            
            
                
            
            return response()->json(['product' => $product,
            'setting' => $setting,
            'mesgs' => $mesgs,
            'pagecount' => $pagecount,
            
            'code' => '200']);





            return view('client.readOther', compact('product', 'setting','mesgs','pagecount'));
        } else {
            
            $pagecount = $product->topic->where('page_status',1)->count();
            
            return response()->json(['product' => $product,
            'setting' => $setting,
            'mesgs' => $mesgs,
            'pagecount' => $pagecount,
            
            'code' => '200']);




            return view('client.read', compact('product', 'setting','mesgs','pagecount'));
        }
        // return $product->topic;
    }
    
    


    
    public function getSetting(){
        $setting = Setting::where('status', 1)->first();
        return response()->json(['data' => $setting, 'code' => '200']);
    }
    
    public function getOrderProduct($id){
        $products = Order::where('client_id', $id)->where('status', 1)->where('product_id', '!=', null)->get();
        return response()->json(['data' => $products, 'code' => '200']);
    }
    
    public function getOrderOtherProduct($id){
        
        $other_products = Order::where('client_id',$id)->where('status', 1)->where('other_product_id', '!=', null)->get();
        return response()->json(['data' => $other_products, 'code' => '200']);
    }
    
    
    //this is for navsection
    public function getNavdata(){
        $banners = Banner::where('status', 1)->get();
        $guideline = Guideline::where('status', 1)->first();
        $education = Education::where('status', 1)->with('product')->get();
        $others = Other::where('status', 1)->get();
        
        return response()->json([
            'banners' => $banners,
            'guideline' => $guideline,
            'others' => $others,
            'education' => $education,
            'code' => '200'
            ]);

    }
    
    
    public function productDetail($prodslug)
    {
       
        $product = Product::where('slug', $prodslug)->with('education', 'semester')->first();
        return response()->json([
            'product' => $product,
            'code' => '200'
            ]);
    }
    
    
    public function educationById($id){
        
        $product = Product::where('education_id',$id)->where('approve',1)->where('status',1)->get();
        return response()->json([
            'product' => $product,
            'code' =>'200']);
        
    }
    
    public function educationList(){
        $education = Education::where('status',1)->with('material')->get();
         return response()->json([
            'education' => $education,
            'code' =>'200']);
    }
    
    public function materialList($eduId){
         $material = Material::where('education_id',$eduId)->where('status',1)->get();
        return response()->json([
            'material' => $material,
            'code' =>'200']);
    }
    
    
    public function levelList($material_id){
        $level = Level::where('material_id',$material_id)->where('status',1)->get();
        return response()->json([
            'level' => $level,
            'code' =>'200']);
    }
    
    public function semesterList($levelId){
        $semester = Semester::where('level_id',$levelId)->where('status',1)->get();
        return response()->json([
            'semester' => $semester,
            'code' =>'200']);
    }
    
     public function productList($semester_id){
        $product = Product::where('semester_id',$semester_id)->where('status',1)->get();
        return response()->json([
            'product' => $product,
            'code' =>'200']);
    }
    
    
    
    public function checkSeller(){
        $seller = User::role('seller')->where('email', request()->seller)->get();
        if (isset($seller) && count($seller) > 0) {
            return response()->json([
            'message' => "success",
            'code' =>'200']);
        } else {
            return response()->json([
            'message' => "failed",
            'code' =>'203']);
        }
    }
    
    
     public function noticeAll($eduslug)
    {
        $education = $this->eduIdConverter($eduslug);
        $notices = EducationNotice::where('education_id', $education->id)->where('status', 1)->get();
        return response()->json([
            'education' => "$education",
            'notices' => "$notices",
            'code' =>'200'
        ]);
            
        return view('frontend.noticeEdu.notice', compact('education', 'notices'));
    }

    public function noticeDetail($noticeslug)
    {
        $notice = EducationNotice::where('slug', $noticeslug)->first();
        $education = Education::findorfail($notice->education_id);
        $notices = EducationNotice::where('status', 1)->where('education_id', $notice->education_id)->where('id', '!=', $notice->id)->get();
       return response()->json([
            'education' => "$education",
            'notices' => "$notices",
            'notice' => "$notice",
            'code' =>'200'
        ]);
    }
    
    
    
   
}
