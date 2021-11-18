<?php

namespace App\Http\Controllers;

use App\OtherProduct;
use App\OtherQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OtherQuestionController extends Controller
{
    public function store(Request $request)
    {
        $product = OtherProduct::findorFail($request->other_product_id);
        if ($product) {
            $request['slug'] = Str::slug($request['name']) . $product->slug;
            $data = $this->validate($request, [
                'name' => 'required|string',
                'slug' => 'required|string',
                'other_product_id' => 'required',
                'description' => 'required|string',
                'image' => 'required_without_all:image,question',
                'question' => 'required_without_all:image,question',

            ]);

            $question = new OtherQuestion();
            $name = "question_img";
            if ($request->hasFile('image')) {

                $data['image'] = $question->uploadImage($request->image, $name);
            }
            $question->create($data);

            $request->session()->flash('success', 'Question Successfully Created');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $product = OtherProduct::findorFail($request->other_product_id);
        if ($product) {
            $request['slug'] = Str::slug($request['name']) . $product->slug;
            $data = $this->validate($request, [
                'name' => 'required|string',
                'slug' => 'required|string',
                'other_product_id' => 'required',
                'description' => 'required|string',
                'image' => 'required_without_all:image,question',
                'question' => 'required_without_all:image,question',
            ]);

            $question = OtherQuestion::findorFail($id);

            // $prod = $this->forProductDetail($question->product_id);
            // $prod_slug = $prod->slug;
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
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $content = OtherQuestion::findorFail($id);
        $content->delete();
        session()->flash('danger', 'Question deleted successfully');
        return redirect()->back();
    }
}
