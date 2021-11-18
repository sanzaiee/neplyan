<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationController extends Controller
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
        $title = "Create Education";
        $education = [];

        $educations = Education::orderBy('position','asc')->get();
        return view('dashboard.education.create', [
            'title' => $title,
            'education' => $education,
            'educations' => $educations,
        ]);
    }

    public function store(Request $request)
    {
        if(!$request->$slug){
            $request['slug'] = Str::slug($request['name'], '-');
        }
        $data = $this->validate($request, [
            'name' => 'required',
            'position' => 'nullable',
            'slug' => 'required|unique'
            
        ]);
        return $data;

        Education::create($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function update(Request $request, $id)
    {
        $education = Education::findorFail($id);

        $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:education,slug,'.$id,
            'position' => 'nullable',

            'status' => 'required',
        ]);

        $education->update($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy($id)
    {
        $education = Education::findorFail($id);

        $education->delete();
        session()->flash('danger', 'education Deleted Successfully');
        return redirect()->back();
    }
}
