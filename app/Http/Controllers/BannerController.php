<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $title = "List of banners";
        $banners = Banner::all();
        return view('dashboard.banner.index', [
            'title' => $title,
            'banners' => $banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create banners";
        $banner = [];
        return view('dashboard.banner.create', [
            'title' => $title,
            'banner' => $banner,
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
            'image' => 'nullable|image',
            'name' => 'required|string',
            'description' => 'required|string',
            // 'publish'=>'required|string',
        ]);

        $banner = new Banner();
        $name = "banner_img";
        if ($request->hasFile('image')) {

            $data['image'] = $banner->uploadImage($request->image, $name);
        }
        $banner->create($data);
        $request->session()->flash('success', 'New banner successfully created');
        return redirect()->back();
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
        $title = "Edit banner";
        $banner = Banner::find($id);
        return view('dashboard.banner.create', [
            'title' => $title,
            'banner' => $banner,
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
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required',
        ]);
        $banner = Banner::find($id);
        $name = "banner_img";

        if (!$request->image == null) {

            $data['image'] = $banner->uploadImage($request->image, $name);
            $image = $banner->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $banner->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $banner->update($data);
            }
        } else {
            $data['image'] = $banner->image;
            $banner->update($data);
        }

        // $banner->update($data);
        $request->session()->flash('success', 'Banner Successfully Updated');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        $banner->delete();
        session()->flash('danger', 'Banner Deleted Successfully');
        return redirect()->back();
    }
}
