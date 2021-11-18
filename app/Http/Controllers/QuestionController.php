<?php

namespace App\Http\Controllers;

use App\Education;
use App\Level;
use App\Material;
use App\OtherProduct;
use App\OtherQuestion;
use App\Product;
use App\Question;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{

    public function forProductDetail($productid)
    {
        return Product::findorFail($productid);
    }


    public function index($productslug)
    {
        // return $productslug;
        $prod = Product::where('slug', $productslug)->first();
        $questions = Question::where('status', 1)->where('product_id', $prod->id)->get();
        return view('dashboard.question.indexByProduct', compact('questions', 'productslug'));
    }

    public function create($question)
    {
        return $question;
    }

    public function allQuestion()
    {
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $questions = Question::where('status', 1)->get();
        return view('dashboard.question.allQuestion', compact(
            'education',
            'materials',
            'levels',
            'semesters',
            'products',
            'questions'
        ));
    }

    public function questionByProd(Request $request)
    {
        $prod = Product::where('id', $request->product_id)->first();
        $question = Question::where('status', 1)->where('product_id', $request->product_id)->get();
        return redirect()->route('question.index', $prod->slug);
    }
    public function show($prodslug)
    {
        $prod = Product::where('slug', $prodslug)->first();
        $question = Question::where('status', 1)->where('product_id', $prod->id)->get();
        // return $prodslug;
        return view('frontend.question.question', compact('prod', 'question'));
    }



    public function questiondetail($slug)
    {
        $question = Question::where('status', 1)->where('slug', $slug)->first();

        $questions = Question::where('id', '!=', $question->id)->where('product_id', $question->product_id)->get();
        $prod = Product::where('id', $question->product_id)->first();

        return view('frontend.question.questionDetail', compact('prod', 'question', 'questions'));
    }


    //to show other-product questions---------------------------------------------------------------------------------------
    public function questionOfOther($prodslug)
    {
        $prod = OtherProduct::where('slug', $prodslug)->first();
        $question = OtherQuestion::where('status', 1)->where('other_product_id', $prod->id)->get();
        // return $prodslug;
        return view('frontend.question.question', compact('prod', 'question'));
    }


    public function otherQuestionDetail($slug)
    {
        $question = OtherQuestion::where('status', 1)->where('slug', $slug)->first();

        $questions = OtherQuestion::where('id', '!=', $question->id)->where('other_product_id', $question->other_product_id)->get();
        $prod = OtherProduct::where('id', $question->product_id)->first();

        return view('frontend.question.questionDetail', compact('prod', 'question', 'questions'));
    }
    //this is fir other product question ends here---------------------------------------------------------------------------------------



    public function directCreate()
    {
        $subject = [];
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        $questions = question::where('status', 1)->get();
        return view('dashboard.question.directCreate', compact('education', 'question', 'materials', 'levels', 'semesters', 'subject'));
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']);
        $data = $this->validate($request, [
            'name' => 'required|string',
            'slug' => 'required|string',
            'product_id' => 'required',
            'description' => 'required|string',
            'image' => 'required_without_all:image,question',
            'question' => 'required_without_all:image,question',

        ]);


        $prod = $this->forProductDetail($request->product_id);
        $prod_slug = $prod->slug;

        // return $data;
        $question = new Question();
        $name = "question_img";
        if ($request->hasFile('image')) {

            $data['image'] = $question->uploadImage($request->image, $name);
        }

        $question->create($data);
        $request->session()->flash('success', 'Question Successfully Created');
        return redirect()->route('question.index', $prod_slug);
    }



    public function update(Request $request, $id)
    {
        $request['slug'] = Str::slug($request['name']);

        $data = $this->validate($request, [
            'name' => 'required|string',
            'slug' => 'required|string',
            'product_id' => 'required',
            'description' => 'required|string',
            'image' => 'required_without_all:image,question',
            'question' => 'required_without_all:image,question',
        ]);

        $question = Question::findorFail($id);

        $prod = $this->forProductDetail($question->product_id);
        $prod_slug = $prod->slug;
        $name = "question_img";

        if (!$request->image == null) {
            $data['image'] = $question->uploadimage($request->image, $name);
            $image = $question->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $question->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $question->update($data);
            }
        } else {
            $data['image'] = $question->image;
            $question->update($data);
        }
        // $question->update($data);
        $request->session()->flash('success', 'Question Successfully Updated');
        return redirect()->route('question.index', $prod_slug);
    }
}
