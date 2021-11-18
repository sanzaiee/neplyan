<?php

namespace App\Http\Controllers;

use App\Education;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    public $education;

    public function __construct(Education $education)
    {
        $this->middleware('auth');
        $this->middleware('admin.access')->except('create');
        $this->education = $education;
    }
    public function foreducationid($education)
    {

        $eduId = $this->education->where('slug', $education)->first();
        // $eduId = Education::where('slug', $education)->first();
        return $eduId->id;
    }
    public function create($education)
    {
        $education_id = $this->foreducationid($education);
        $educations = Education::findorFail($education_id);
        $materials = Material::where('education_id', $education_id)->get();
        return view('dashboard.material.create', compact('materials', 'education', 'educations'));
    }

    public function create1()
    {
        $materials = Material::where('status', 1)->get();

        return view('dashboard.material.create1', compact('materials'));
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']) . '-' . $request->education_id; //education_id carries slug of education

        $request['education_id'] = $this->foreducationid($request->education_id);
        $data = $this->validate($request, [
            'name' => 'required',
            'education_id' => 'required',
            'slug' => 'required|unique:materials',
        ]);

        Material::create($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function update(Request $request, $id)
    {
        $material = Material::findorFail($id);
    
        $data = $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:materials,slug,'.$id,
        ]);
        
        $material->update($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroy($id)
    {
        $material = Material::findorFail($id);

        $material->delete();
        session()->flash('danger', 'Material Deleted Successfully');
        return redirect()->back();
    }
}
