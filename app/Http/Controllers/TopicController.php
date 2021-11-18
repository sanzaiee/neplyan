<?php

namespace App\Http\Controllers;

use App\Product;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forProductId($product)
    {
        $product = Product::where('slug', $product)->first();
        return $product->id;
    }
    public function create($product)
    {
        $pid = $this->forProductId($product);
        $product = Product::findorFail($pid);
        $headings = Topic::where('product_id', $product->id)->where('status', 1)->get();
        return view('dashboard.topic.create', compact('product', 'headings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'nullable|string',
            'heading' => 'nullable|string',
            'is_chapter' => 'required',
            'page_status' => 'required',
            'product_id' => 'required|string',
            'description' => 'nullable',
        ]);
        
         $data['status'] = 1;
        Topic::create($data);

        $request->session()->flash('success', 'Successfully Created');

        return redirect()->back();
        // return redirect()->route('add.book.content', $request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $heading = Topic::findorFail($id);
        
        // return $request->description;

        $data = $this->validate($request, [
            'title' => 'nullable|string',
            'heading' => 'nullable|string',
            'is_chapter' => 'required',
            'page_status' => 'required',
            'product_id' => 'required|string',
            'description' => 'nullable',
        ]);

        $heading->update($data);

        $request->session()->flash('success', 'Successfully Updated');

        return redirect()->back();
        // return redirect()->route('add.book.content', $request->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heading = Topic::findorFail($id);
        $heading->delete();
        session()->flash('danger', 'Heading deleted successfully');
        return redirect()->back();
    }
}
