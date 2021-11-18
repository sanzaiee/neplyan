<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $title = "List of Tag";
        $tags = Tag::all();
        return view('dashboard.tag.index', [
            'title' => $title,
            'tags' => $tags,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Tag";
        $tag = [];
        return view('dashboard.tag.create', [
            'title' => $title,
            'tag' => $tag,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'name' => 'required|string',
        ]);
        $tag = new Tag();
        $tag->create($data);
        $request->session()->flash('success', 'Successfully Created');
        return redirect()->route('tag.index');
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
        $title = "Edit Tag";
        $tag = Tag::findorFail($id);
        return view('dashboard.tag.create', [
            'title' => $title,
            'tag' => $tag,
        ]);
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
        $data = $this->validate($request, [
            'name' => 'required|string',
            'status' => 'required',
        ]);

        $tag = Tag::findorFail($id);

        $tag->update($data);
        $request->session()->flash('success', 'Tag Successfully Updated');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findorFail($id);
        $tag->delete();
        session()->flash('danger', 'Tag Deleted Successfully');
        return redirect()->back();
    }
}
