<?php

namespace App\Http\Controllers;

use App\Education;
use App\Level;
use App\Material;
use App\OtherProduct;
use App\Product;
use App\Semester;
use App\Setting;
use App\SellerMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $semester;

    public function __construct(Semester $semester)
    {
        $this->semester = $semester;
    }

    public function forsemesterforindexid($semester)
    {

        $semesters = $this->semester->where('slug', $semester)->first();
        return $semesters->id;
    }

    public function index($semester)
    {
        $semester_id = $this->forsemesterforindexid($semester);
        $semesters = Semester::findorFail($semester_id);
        $products = Product::where('semester_id', $semester_id)->get();
        return view('dashboard.product.index', compact('products', 'semester', 'semesters'));
    }


    public function all()
    {
        // $products = Product::where('status', 1)->where('approve', 1)->get();
        // return view('dashboard.product.all', compact('products'));
        $subject = [];
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.product.all', compact('education', 'materials', 'levels', 'semesters', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($semester)
    {
        $semesters = Semester::where('slug', $semester)->with('level')->first();
        // return $semesters->level->material->education;
        $products = Product::where('status', 1)->where('semester_id', $semesters->id)->get();

        return view('dashboard.product.create', compact('products', 'semester', 'semesters'));
    }

    public function create1()
    {
        $product = [];
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.product.create', compact('education', 'materials', 'levels', 'semesters', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function forsemesterid($semester)
    {

        return $semesters = $this->semester->where('id', $semester)->first();
        // $semesters = semester::where('slug', $semester)->first();
        // return $semesters->level->material->education;
    }

    public function allProduct()
    {
        $subjects = Product::all();
        return view('dashboard.subject.index')->with('subjects', $subjects);
    }

    public function store(Request $request)
    {
        $semester = $this->forsemesterid($request->semester_id);
        $request['education_id'] = $semester->level->material->education->id;

        $slug = $semester->slug;
         $request['slug'] = Str::slug($request['name']) . '-' . $slug;

        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'author' => 'unique:products|required',
            'slug' => 'unique:products|required',
            'name' => 'required|string',
            'semester_id' => 'required',
            'education_id' => 'required',
            'description' => 'required|string',
            'price' => 'required',
            'free' => 'nullable',

        ]);
        if (Auth::user()->is_super_admin == 1) {
            $data['approve'] = 1;
        } else {
            $data['approve'] = 0;
        }
        $data['status'] = 0;

        $data['user_id'] = Auth::user()->id;

        $product = new Product();
        $name = "product_img";
        if ($request->hasFile('image')) {

            $data['image'] = $product->uploadImage($request->image, $name);
        }
        // $data['status'] = 1;
        $product->create($data);
        $request->session()->flash('success', 'product Successfully Created');
        return redirect()->route('product.index', $slug);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.product.create', compact('education', 'materials', 'levels', 'semesters', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['slug'] = Str::slug($request['name'], '-');

        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required|string',
            'price' => 'required|string',
            'description' => 'required|string',
            'free' => 'nullable',

        ]);

        $product = Product::findorFail($id);

        $semester = $this->forsemesterid($product->semester_id);
        $slug = $semester->slug;
        $name = "product_img";

        if (!$request->image == null) {
            $data['image'] = $product->uploadimage($request->image, $name);
            $image = $product->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $product->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $product->update($data);
            }
        } else {
            $data['image'] = $product->image;
            $product->update($data);
        }
        // $product->update($data);
        $request->session()->flash('success', 'Product Successfully Updated');
        // return redirect()->route('product.index', $slug);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $product = Product::findorFail($id);
        if (Auth::user()->id == $product->user_id || Auth::user()->is_super_admin == 1) {
            
            
            $product->delete();
            session()->flash('danger', 'product Deleted Successfully');
            return redirect()->back();
        }
        
        return Auth::user();
    }


    public function vendorProduct()
    {
        $products = Product::where('status', 1)->where('user_id', Auth::user()->id)->get();
        return view('dashboard.vendor.myproduct', compact('products'));
    }

    public function overviewProduct()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();
        return view('dashboard.vendor.overviewproduct', compact('products'));
    }

    public function readProduct($slug)
    {
        $product = Product::where('slug', $slug)->with('topic')->first();
        $pagecount = $product->topic->where('page_status',1)->count();
        $setting =Setting::where('status',1)->first();
        return view('dashboard.vendor.read', compact('product','setting','pagecount'));
    }

    public function readProductClient($slug)
    {
        $mesgs = SellerMessage::where('client_id', auth()->id())->where('status', 1)->get();
        $setting = Setting::where('status', 1)->first();
        $product = Product::where('slug', $slug)->with('topic')->first();
        if (!$product) {
            $product = OtherProduct::where('slug', $slug)->with('other_topic')->first();
            $pagecount = $product->other_topic->where('page_status',1)->count();
            return view('client.readOther', compact('product', 'setting','mesgs','pagecount'));
        } else {
            
            $pagecount = $product->topic->where('page_status',1)->count();

            return view('client.read', compact('product', 'setting','mesgs','pagecount'));
        }
        // return $product->topic;
    }


    public function byEducation($eduslug)
    {
        $edu = Education::where('slug', $eduslug)->first();
        $products = Product::where('education_id', $edu->id)->where('status', 1)->get();
        return view('dashboard.product.productBy', compact('products', 'edu'));
    }

    public function productDetail($prodslug)
    {
        $product = Product::where('slug', $prodslug)->with('education', 'semester')->first();
        // return $product->semester->level;
        return view('frontend.product.course-detail', compact('product'));
    }
}
