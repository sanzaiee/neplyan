<?php

namespace App\Http\Controllers;

use App\Other;
use App\OtherProduct;
use App\OtherQuestion;
use App\OtherTopic;
use Illuminate\Http\Request;

class OtherTopicController extends Controller
{
    public function forotherId($other)
    {
        return $other = OtherProduct::where('slug', $other)->first();
    }
    public function create($other)
    {
        $other = $this->forotherId($other);
        // $other = Other::findorFail($pid);
        $headings = OtherTopic::where('other_product_id', $other->id)->where('status', 1)->get();

        $questions = OtherQuestion::where('other_product_id', $other->id)->where('status', 1)->get();
        return view('dashboard.othertopic.create', compact('other', 'headings', 'questions'));
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
            'other_product_id' => 'required|string',
            'description' => 'nullable',
        ]);

        OtherTopic::create($data);

        $request->session()->flash('success', 'Successfully Created');

        return redirect()->back();
        // return redirect()->route('add.book.content', $request->other_id);
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
        $heading = OtherTopic::findorFail($id);

        $data = $this->validate($request, [
            'title' => 'nullable|string',
            'heading' => 'nullable|string',
            'other_id' => 'required|string',
            'description' => 'nullable',
        ]);

        $heading->update($data);

        $request->session()->flash('success', 'Successfully Updated');

        return redirect()->back();
        // return redirect()->route('add.book.content', $request->other_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heading = OtherTopic::findorFail($id);
        $heading->delete();
        session()->flash('danger', 'Heading deleted successfully');
        return redirect()->back();
    }
}
