<?php

namespace App\Http\Controllers;

use App\RandomContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RandomContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List of RandomContent";
        $contents = RandomContent::all();
        return view('dashboard.randomcontent.index', [
            'title' => $title,
            'contents' => $contents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Content";
        $content = [];
     
        return view('dashboard.randomcontent.create', [
            'title' => $title,
            'content' => $content,
            
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
        $data = $this->validate($request, [
            'content' => 'nullable',
            'name' => 'required|string',
            'content_type' => 'required',

        ]);
        
        $content = new RandomContent();
        $name = "random_img";
        if ($request->hasFile('content')) {

            $data['content'] = $content->uploadImage($request->content, $name);
        }

        $content->create($data);
        $request->session()->flash('success', 'Content Successfully Created');
        return redirect()->route('random.index');
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
        $title = "Edit Content";
        $content = RandomContent::findorFail($id);
        return view('dashboard.randomcontent.create', [
            'title' => $title,
            'content' => $content,
           
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
        $request['slug'] = Str::slug($request['name'], '-');

        $data = $this->validate($request, [
            'content' => 'nullable',
            'name' => 'required|string',
            'content_type' => 'required',
            'status' =>'required'
        ]);
        $content = RandomContent::find($id);
        $name = "random_img";

        if (!$request->content == null) {
            $data['content'] = $content->uploadimage($request->content, $name);
            $cont = $content->content;
            $path = public_path($name);
            $cut = explode('/', $cont);
            if ($cut == [""]) {
                $content->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $content->update($data);
            }
        } else {
            $data['content'] = $content->content;
            $content->update($data);
        }

        $request->session()->flash('success', 'Content Successfully Updated');
        return redirect()->route('random.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = RandomContent::findorFail($id);

        $blog->delete();
        session()->flash('danger', 'Content Deleted Successfully');
        return redirect()->back();
    }
}
