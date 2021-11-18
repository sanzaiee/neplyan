<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function create()
    {
        $profile = ClientProfile::where('client_id', Auth::guard('client')->user()->id)->first();
        $client = Client::findorFail(Auth::guard('client')->user()->id);

        if (!$profile) {

            return view('client.profile', compact('client', 'profile'));
        }
        return view('client.profile', compact('client', 'profile'));
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

        $data['client_id'] = Auth::guard('client')->user()->id;
        $profile = new ClientProfile();
        $name = "client_img";
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
        $client = ClientProfile::findorFail($id);
        $name = "client_img";

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
        $request->session()->flash('success', 'Client Successfully Updated');
        return redirect()->back();
    }
}
