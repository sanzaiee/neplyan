<?php

namespace App\Http\Controllers;

use App\Other;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OtherController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['admin.access']);
        // $this->middleware('admin.access', ['except' => ['create']]);
        $this->middleware('auth');
        // $this->middleware('admin.access')->only('index');
        $this->middleware('admin.access')->except('create');
    }
    public function create()
    {
        $title = "Create Other";
        $other = [];

        $others = Other::all();
        return view('dashboard.other.create', [
            'title' => $title,
            'other' => $other,
            'others' => $others,
        ]);
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        Other::create($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function update(Request $request, $id)
    {
        $other = Other::findorFail($id);

        $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);

        $other->update($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy($id)
    {
        $other = Other::findorFail($id);

        $other->delete();
        session()->flash('danger', 'other Deleted Successfully');
        return redirect()->back();
    }
}
