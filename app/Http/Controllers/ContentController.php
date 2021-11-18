<?php

namespace App\Http\Controllers;

use App\Content;
use App\Heading;
use Illuminate\Http\Request;

class ContentController extends Controller
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
    public function create($heading)
    {
        $heading = Heading::findorFail($heading);
        $contents = Content::where('heading_id', $heading->id)->where('status', 1)->get();
        return view('dashboard.content.create', compact('heading', 'contents'));
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
            'title' => 'required|string',
            'content' => 'required|string',
            'heading_id' => 'required|string',
        ]);

        Content::create($data);

        $request->session()->flash('success', 'Successfully Created');

        return redirect()->route('add.heading.content', $request->heading_id);
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
        $content = Content::findorFail($id);

        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'heading_id' => 'required|string',
        ]);

        $content->update($data);

        $request->session()->flash('success', 'Successfully Updated');

        return redirect()->route('add.heading.content', $request->heading_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findorFail($id);
        $content->delete();
        session()->flash('danger', 'Content deleted successfully');
        return redirect()->back();
    }
}
