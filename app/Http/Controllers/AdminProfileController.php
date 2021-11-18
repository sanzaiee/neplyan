<?php

namespace App\Http\Controllers;

use App\AdminProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function create()
    {
        $profile = AdminProfile::where('admin_id', Auth::user()->id)->first();
        $client = User::findorFail(Auth::id());

        if (!$profile) {

            return view('dashboard.profile', compact('client', 'profile'));
        }
        return view('dashboard.profile', compact('client', 'profile'));
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'fullname' => 'nullable',
            'address' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'about' => 'nullable',
            'image' => 'nullable'
        ]);

        $data['admin_id'] = Auth::user()->id;
        $profile = new AdminProfile();
        $name = "admin_img";
        if ($request->hasFile('image')) {

            $data['image'] = $profile->uploadImage($request->image, $name);
        }

        $profile->create($data);
        $request->session()->flash('success', 'Profile Successfully Updated');
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'fullname' => 'nullable',
            'address' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'about' => 'nullable',
            'image' => 'nullable'
        ]);

        $client = AdminProfile::findorFail($id);
        $name = "admin_img";

        if (!$request->image == null) {
            $data['image'] = $client->uploadimage($request->image, $name);
            $image = $client->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $client->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $client->update($data);
            }
        } else {
            $data['image'] = $client->image;
            $client->update($data);
        }

        // $client->update($data);
        $request->session()->flash('success', 'Admin Successfully Updated');
        return redirect()->back();
    }
}
