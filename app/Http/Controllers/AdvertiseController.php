<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertis;

class AdvertiseController extends Controller
{
     public function index()
    {
        $title = "List of Advertisement";
        $abouts = Advertis::all();
        return view('dashboard.advertise.index', [
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
        $title = "Create Advertisement";
        $about = [];
        return view('dashboard.advertise.create', [
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
            'placement' => 'required|string',
            'name' => 'required|string',
        ]);
        
        $about = new Advertis();
        $name = "abver_img";

        if ($request->hasFile('image')) {
            $data['image'] = $about->uploadImage($request->image, $name);
        }

        $about->create($data);
        return redirect()->back()->with('success', 'Advert Content Successfully Created');
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
        $title = "Edit Advertisement";
        $about = Advertis::findorFail($id);
        return view('dashboard.advertise.create', [
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
            'placement' => 'required|string',
            'name' => 'required|string',
            'status' => 'required',
        ]);

        $about = Advertis::findorFail($id);
        $name = "abver_img";

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
        $request->session()->flash('success', 'Advert successfully updated');
        return redirect()->route('advertise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Advertis::findorFail($id);

        $about->delete();
        session()->flash('danger', 'Deleted Successfully');

        return redirect()->back();
    }
}
