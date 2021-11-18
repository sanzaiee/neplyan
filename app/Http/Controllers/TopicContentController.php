<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicContent;
use Illuminate\Http\Request;

class TopicContentController extends Controller
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
    public function create($topic)
    {
        $topic = Topic::findorFail($topic);
        $contents = TopicContent::where('topic_id', $topic->id)->where('status', 1)->get();
        return view('dashboard.content.create', compact('topic', 'contents'));
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
            'topic_id' => 'required|string',
        ]);

        TopicContent::create($data);

        $request->session()->flash('success', 'Successfully Created');

        return redirect()->back();
        // return redirect()->route('add.heading.content', $request->heading_id);
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
        $content = TopicContent::findorFail($id);

        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'heading_id' => 'required|string',
        ]);

        $content->update($data);

        $request->session()->flash('success', 'Successfully Updated');

        return redirect()->back();
        // return redirect()->route('add.heading.content', $request->heading_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = TopicContent::findorFail($id);
        $content->delete();
        session()->flash('danger', 'Content deleted successfully');
        return redirect()->back();
    }
}
