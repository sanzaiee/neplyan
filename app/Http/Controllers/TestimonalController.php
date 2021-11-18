<?php

namespace App\Http\Controllers;

use App\Testimonal;
use Illuminate\Http\Request;

class TestimonalController extends Controller
{
    public function index()
    {
        $title = "List of testimonals";
        $testimonals = Testimonal::all();
        return view('dashboard.testimonal.index', [
            'title' => $title,
            'testimonals' => $testimonals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create testimonals";
        $testimonal = [];
        return view('dashboard.testimonal.create', [
            'title' => $title,
            'testimonal' => $testimonal,
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
            'post' => 'required|string',
            'message' => 'required|string',
            // 'publish'=>'required|string',
        ]);

        $testimonal = new Testimonal();
        $name = "testimonal_img";
        if ($request->hasFile('image')) {

            $data['image'] = $testimonal->uploadImage($request->image, $name);
        }
        $testimonal->create($data);
        $request->session()->flash('success', 'New testimonal successfully created');
        return redirect()->route('testimonal.index');
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
        $title = "Edit testimonal";
        $testimonal = Testimonal::find($id);
        return view('dashboard.testimonal.create', [
            'title' => $title,
            'testimonal' => $testimonal,
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
            'post' => 'required|string',
            'message' => 'required|string',
            'status' => 'required',
        ]);
        $testimonal = Testimonal::find($id);
        $name = "testimonal_img";

        if (!$request->image == null) {

            $data['image'] = $testimonal->uploadimage($request->image, $name);
            $image = $testimonal->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $testimonal->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $testimonal->update($data);
            }
        } else {
            $data['image'] = $testimonal->image;
            $testimonal->update($data);
        }

        // $testimonal->update($data);
        $request->session()->flash('success', 'Testimonal Successfully Updated');
        return redirect()->route('testimonal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonal = Testimonal::find($id);

        $testimonal->delete();
        session()->flash('danger', 'Testimonal Deleted Successfully');
        return redirect()->back();
    }
}
