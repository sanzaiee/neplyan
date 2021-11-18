<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List of blogs";
        $blogs = Blog::all();
        return view('dashboard.blog.index', [
            'title' => $title,
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Blog";
        $tags = Tag::where('status', 1)->get();
        $blog = [];
        // $tag_name = Tag::where('id', $blog->id)->pluck('name')->first();
        return view('dashboard.blog.create', [
            'title' => $title,
            'blog' => $blog,
            'tags' => $tags,
            // 'tag_name' => $tag_name,

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
        $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required|string',
            'slug' => 'required|string',
            'tag_id' => 'required',
            'description' => 'required|string',
            'short_description' => 'required|string',
            // 'publish'=>'required|string',
        ]);

        $blog = new Blog();
        $name = "blog_img";
        if ($request->hasFile('image')) {

            $data['image'] = $blog->uploadImage($request->image, $name);
        }

        $blog->create($data);
        $request->session()->flash('success', 'Blog Successfully Created');
        return redirect()->route('blog.index');
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
        $title = "Edit Blog";
        $blog = Blog::findorFail($id);
        $tags = Tag::where('status', 1)->get();
        $tag_name = Tag::where('id', $blog->tag_id)->pluck('name')->first();

        return view('dashboard.blog.create', [
            'title' => $title,
            'blog' => $blog,
            'tags' => $tags,
            'tag_name' => $tag_name,
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
            'image' => 'nullable|image',
            'name' => 'required|string',
            'slug' => 'required|string',
            'tag_id' => 'required',
            'status' => 'required',
            'description' => 'required|string',
            'short_description' => 'required|string',
        ]);
        $blog = Blog::find($id);
        $name = "blog_img";

        if (!$request->image == null) {
            $data['image'] = $blog->uploadimage($request->image, $name);
            $image = $blog->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $blog->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $blog->update($data);
            }
        } else {
            $data['image'] = $blog->image;
            $blog->update($data);
        }

        // $blog->update($data);
        $request->session()->flash('success', 'blog Successfully Updated');
        return redirect()->route('blog.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findorFail($id);

        $blog->delete();
        session()->flash('danger', 'Blog Deleted Successfully');
        return redirect()->back();
    }
}
