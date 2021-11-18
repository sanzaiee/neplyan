<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    private $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }

    public function index()
    {
        $title = "List of abouts";
        $abouts = About::all();
        return view('dashboard.about.index', [
            'title' => $title,
            'abouts' => $abouts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create abouts";
        $about = [];
        return view('dashboard.about.create', [
            'title' => $title,
            'about' => $about,
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
            'image' => 'nullable|image',
            'description' => 'required|string',
            'title' => 'required|string',
            'short_description' => 'required|string',
        ]);
        $about = new About();
        $name = "about_img";

        if ($request->hasFile('image')) {
            $data['image'] = $about->uploadImage($request->image, $name);
        }

        $about->create($data);
        return redirect()->back()->with('success', 'About Content Successfully Created');
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
        $title = "Edit about";
        $about = About::findorFail($id);
        return view('dashboard.about.create', [
            'title' => $title,
            'about' => $about,
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
            'image' => 'nullable|image',
            'description' => 'required|string',
            'title' => 'required|string',
            'short_description' => 'required|string',
            'status' => 'required',
        ]);

        $about = About::findorFail($id);
        $name = "about_img";

        if (!$request->image == null) {
            $data['image'] = $about->uploadimage($request->image, $name);
            $image = $about->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $about->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $about->update($data);
            }
        } else {
            $data['image'] = $about->image;
        }

        $about->update($data);
        $request->session()->flash('success', 'About successfully updated');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findorFail($id);

        $about->delete();
        session()->flash('danger', 'Deleted Successfully');

        return redirect()->back();
    }
}
