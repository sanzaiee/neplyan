<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $title = "List of settings";
        $settings = Setting::all();
        return view('dashboard.setting.index', [
            'title' => $title,
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Setting::where('status', 1)->first();
        if ($data == null) {
            $setting = [];
        } else {
            $setting = $data;
        }
        $title = "Create settings";
        return view('dashboard.setting.create', [
            'title' => $title,
            'setting' => $setting,
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
            'fav' => 'nullable|image',

            'name' => 'nullable|string',
            'location' => 'nullable|string',
            'email' => 'nullable|email|unique:settings',
            'footer' => 'nullable|string',
            'maplink' => 'nullable|string',
            'phone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'opening' => 'nullable|string',

        ]);
        $setting = new Setting();
        $name = "settting";

        if ($request->hasFile('image')) {
            $data['image'] = $setting->uploadImage($request->image, $name);
        }
        
          if ($request->hasFile('fav')) {
            $data['fav'] = $setting->uploadImage($request->fav, $name);
        }

        $setting->create($data);
        $request->session()->flash('success', 'Setting successfully created');
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
    // public function edit($id)
    // {
    //     $title = "Edit setting";
    //     $setting = Setting::find($id);
    //     return view('dashboard.setting.edit', [
    //         'title' => $title,
    //         'setting' => $setting,
    //     ]);
    // }

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
            'name' => 'nullable|string',            
            'fav' => 'nullable|image',

            'location' => 'nullable|string',
            'email' => 'nullable|email',
            'footer' => 'nullable',
            'maplink' => 'nullable|string',
            'phone' => 'nullable|string',
            'mobile' => 'nullable|string',
            // 'status' => 'required',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'opening' => 'nullable|string',

        ]);
        $setting = Setting::findorFail($id);
        $name = "settting";
       
        if (!$request->image == null) {

            $data['image'] = $setting->uploadimage($request->image, $name);
            $image = $setting->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $setting->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $setting->update($data);
            }
        }
        
        
          if (!$request->fav == null) {

            $data['fav'] = $setting->uploadimage($request->fav, $name);
            $fav = $setting->fav;
            $path = public_path($name);
            $cut = explode('/', $fav);
            // return $cut[1];
            if ($cut == [""]) {
                $setting->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $setting->update($data);
            }
        }
        
        
        $data['image'] = $setting->image;        
        $data['fav'] = $setting->fav;

        $setting->update($data);
       
        $request->session()->flash('success', 'Setting successfully updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        // if (!$setting->image == null) {
        //     $image = $setting->image;
        //     unlink($image);
        // }
        $setting->delete();
        session()->flash('danger', 'setting deleted successfully');
        return redirect()->back();
    }
}
