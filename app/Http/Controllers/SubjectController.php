<?php

namespace App\Http\Controllers;

use App\Education;
use App\Level;
use App\Material;
use App\Semester;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('dashboard.subject.index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($semester)
    {
        $semesters = Semester::where('slug', $semester)->with('level')->first();
        // return $semesters->level->material->education;
        $subjects = Subject::where('status', 1)->where('semester_id', $semesters->id)->get();

        return view('dashboard.subject.create', compact('subjects', 'semester', 'semesters'));
    }

    public function create1()
    {
        $subject = [];
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.subject.create', compact('education', 'materials', 'levels', 'semesters', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'author' => 'unique:subjects|required',
            'name' => 'required|string',
            'education_id' => 'required|string',
            'material_id' => 'required',
            'description' => 'required|string',
            'semester_id' => 'required|string',
            'level_id' => 'required|string',
            'price' => 'required',
        ]);
        $subject = new Subject();
        $name = "subject_img";
        if ($request->hasFile('image')) {

            $data['image'] = $subject->uploadImage($request->image, $name);
        }

        $data['status'] = 1;
        $subject->create($data);
        $request->session()->flash('success', 'subject Successfully Created');
        return redirect()->route('subject.index');
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
        $subject = Subject::findorFail($id);
        $education = Education::where('status', 1)->get();
        $materials = Material::where('status', 1)->get();
        $levels = Level::where('status', 1)->get();
        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.subject.create', compact('education', 'materials', 'levels', 'semesters', 'subject'));
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
        // $request['slug'] = Str::slug($request['name'], '-');

        $data = $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required|string',
            'price' => 'required|string',
            'education_id' => 'required|string',
            'material_id' => 'required',
            'description' => 'required|string',
            'level_id' => 'required|string',
            'semester_id' => 'required|string',
            'status' => 'required|string',
        ]);
        $subject = Subject::findorFail($id);
        $name = "subject_img";

        if (!$request->image == null) {
            $data['image'] = $subject->uploadimage($request->image, $name);
            $image = $subject->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $subject->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $subject->update($data);
            }
        } else {
            $data['image'] = $subject->image;
            $subject->update($data);
        }

        // $subject->update($data);
        $request->session()->flash('success', 'Subject Successfully Updated');
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findorFail($id);

        $subject->delete();
        session()->flash('danger', 'Subject Deleted Successfully');
        return redirect()->back();
    }
}
