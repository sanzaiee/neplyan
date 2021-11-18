<?php

namespace App\Http\Controllers;

use App\Education;
use App\Level;
use App\Material;
use App\Other;
use App\OtherProduct;
use App\Product;
use App\Semester;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:browse_product_employee')->only('prodByUser');
        $this->middleware('permission:create_product_employee')->only(['directProdcreate', 'storeProduct', 'updateProduct']);
        $this->middleware('permission:browse_other_product_employee')->only('otherProdByUser');
        $this->middleware('permission:create_other_product_employee')->only(['directOtherProdcreate', 'storeOtherProduct', 'updateOtherProduct']);
        $this->middleware('permission:read_product_employee')->only('overviewProduct');
    }

    public function material($id)
    {
        echo json_encode(Material::where("education_id", $id)->pluck("name", "id"));
    }

    public function level($id)
    {
        echo json_encode(Level::where("material_id", $id)->pluck("name", "id"));
    }

    public function semester($id)
    {
        echo json_encode(Semester::where("level_id", $id)->pluck("name", "id"));
    }

    public function product($id)
    {
        echo json_encode(Product::where("semester_id", $id)->where('user_id', Auth::user()->id)->pluck("name", "id"));
    }

    public function otherproduct($id)
    {
        echo json_encode(OtherProduct::where("other_id", $id)->pluck("name", "id"));
    }

    public function createProduct($semester)
    {
        $semesters = Semester::where('slug', $semester)->with('level')->first();
        $products = Product::where('semester_id', $semesters->id)->get();
        
        return view('dashboard.vendor.product.createBySemester', compact('products', 'semester', 'semesters'));
    }
    
    public function productSearch(Request $request)
    {
        $data = $this->validate($request, [
            'semester_id' => 'required',
        ]);
        if ($request['product_id'] == 0) {
            $semester = Semester::findorFail($request['semester_id']);
            return redirect()->route('employee.add.product', $semester->slug);
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
            return redirect()->route('employee.other.product.create.id', $request->other_id);
            $products = OtherProduct::where('other_id', $data['other_id'])->where('status', 1)->where('approve', 1)->get();
        } else {
            $product = OtherProduct::findorFail($request->product_id);

            // $headings = OtherTopic::where('other_product_id', $product->id)->where('status', 1)->get();
            // return view('dashboard.otherproduct.add-content', compact('product', 'headings'));

            return redirect()->route('add.other.topic', $product->slug);
        }
    }


    public function prodByUser()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view('dashboard.vendor.product.prodByUser', compact('products'));
    }
    
    
    
    public function prodByEducation($slug){
        $education = Education::where('slug',$slug)->firstorFail() ;
        $products = Product::where('user_id', auth()->user()->id)->where('education_id',$education->id)->get();
        return view('dashboard.vendor.product.prodByUser', compact('products'));
    }
    
    
     public function prodByOtherEducation($slug){
        $education = Other::where('slug',$slug)->firstorFail() ;
        $products = OtherProduct::where('user_id', auth()->user()->id)->where('other_id',$education->id)->get();
      
        return view('dashboard.vendor.otherproduct.otherProdByUser', compact('products'));
    }
    
    
    public function otherProdByUser()
    {
        $products = OtherProduct::where('user_id', auth()->user()->id)->get();
        return view('dashboard.vendor.otherproduct.otherProdByUser', compact('products'));
    }
    public function directProdcreate()
    {
        $education = Education::where('status', 1)->get();
        return view('dashboard.vendor.product.directProdCreate', compact('education'));
    }
    public function directOtherProdcreate()
    {
        $others = Other::where('status', 1)->get();
        return view('dashboard.vendor.otherproduct.directOtherProdCreate', compact('others'));
    }
    public function storeProduct(Request $request)
    {
        $semester = Semester::findorFail($request->semester_id);
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
        ]);
        if (Auth::user()->role_id == 1) {
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
        return redirect()->route('productBy.user');
    }
    public function updateProduct(Request $request, $id)
    {
        $semester = Semester::findorFail($request->semester_id);
        $request['education_id'] = $semester->level->material->education->id;

        $slug = $semester->slug;

        $request['slug'] = Str::slug($request['name']) . '-' . $slug;
        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required|string',
            'status' => 'required',
            'price' => 'required|string',
            'description' => 'required|string',
        ]);

        $product = Product::findorFail($id);

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
    public function storeOtherProduct(Request $request)
    {
        $other = Other::findorFail($request->other_id);
        if ($other) {
            $request['slug'] = Str::slug($request['name']) . '-' . 'OTPRo' . $other->slug;
            $data = $this->validate($request, [
                'image' => 'nullable|image',
                'author' => 'unique:products|required',
                'slug' => 'unique:products|required',
                'name' => 'required|string',
                'other_id' => 'required',
                'description' => 'required|string',
                'price' => 'required',
            ]);

            $data['approve'] = (Auth::user()->role_id == 1) ? 1 : 0;

            $data['user_id'] = Auth::user()->id;
            $data['status'] = 0;

            $product = new OtherProduct();

            $name = "product_img";
            if ($request->hasFile('image')) {
                $data['image'] = $product->uploadImage($request->image, $name);
            }
            $product->create($data);

            $request->session()->flash('success', 'Product Successfully Created');
            return redirect()->route('otherproductBy.user');
        }
    }
    public function updateOtherProduct(Request $request, $id)
    {
        $other = Other::findorFail($request->other_id);
        if ($other) {
            $request['slug'] = Str::slug($request['name']) . '-' . 'OTPRo' . $other->slug;

            $data = $this->validate($request, [
                'image' => 'nullable|image',
                'name' => 'required|string',
                'status' => 'required',
                'price' => 'required|string',
                'author' => 'required|string',
                'description' => 'required|string',
            ]);

            $product = OtherProduct::findorFail($id);
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
            return redirect()->back();
        }
    }
    public function overviewProduct()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();
        $other_products = OtherProduct::where('user_id', Auth::user()->id)->get();
        return view('dashboard.vendor.overviewproduct', compact('products', 'other_products'));
    }


    public function createById($other_id)
    {
        $other = Other::findorFail($other_id);
        return view('dashboard.vendor.otherproduct.createById', compact('other_id', 'other'));
    }
}
// ->when($request->categoryId != "all", function ($query) use ($request) {
//     return $query->where('category_id', $request->categoryId);
// })
