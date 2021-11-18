<?php

namespace App\Http\Controllers;

use App\OtherTopic;
use App\OtherTopicContent;
use Illuminate\Http\Request;

class OtherTopicContentController extends Controller
{
    public function create($topic)
    {
        $topic = OtherTopic::findorFail($topic);
        $contents = OtherTopicContent::where('other_topic_id', $topic->id)->where('status', 1)->get();
        return view('dashboard.othertopiccontent.create', compact('topic', 'contents'));
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
            'other_topic_id' => 'required|string',
        ]);

        OtherTopicContent::create($data);

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
        $content = OtherTopicContent::findorFail($id);

        $data = $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',
            'other_topic_id' => 'required|string',
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
        $content = OtherTopicContent::findorFail($id);
        $content->delete();
        session()->flash('danger', 'Content deleted successfully');
        return redirect()->back();
    }
}
