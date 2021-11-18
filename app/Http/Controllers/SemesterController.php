<?php

namespace App\Http\Controllers;

use App\Level;
use App\Product;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SemesterController extends Controller
{

    public $level;

    public function __construct(Level $level)
    {
        $this->middleware('auth')->except('productBysemester');
        $this->middleware('admin.access')->except('create', 'productBysemester');
        $this->level = $level;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($level)
    {
        // $educations = Education::findorFail($education_id);
        // $materials = Material::where('status', 1)->where('education_id', $education_id)->get();

        $levels = Level::where('slug', $level)->with('material')->first();
        // return $levels->material->education;
        $semesters = Semester::where('level_id', $levels->id)->get();

        return view('dashboard.semester.create', compact('semesters', 'level', 'levels'));
    }


    public function create1()
    {

        $semesters = Semester::where('status', 1)->get();
        return view('dashboard.semester.create1', compact('semesters'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function forLevelId($level)
    {
        $matId = $this->level->where('slug', $level)->first();
        return $matId->id;
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']) . '-' . $request->level_id; //level_id carries level slug
        $request['level_id'] = $this->forLevelId($request->level_id);

        $data = $this->validate($request, [
            'name' => 'required',
            'level_id' => 'required',
            'slug' => 'required',
        ]);

        Semester::create($data);
        return redirect()->back()->with('success', 'Successfully Updated');
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
        //
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
        $semester = Semester::findorFail($id);
       
        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:semesters,slug,'.$id,
        ]);
        
        $semester->update($data);
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function productBysemester($semesterslug)
    {
        $semester = Semester::where('slug', $semesterslug)->first();
        //this edu is for the breadcurmb in course page
        $edu = [];
        $products = Product::where('semester_id', $semester->id)->where('approve', 1)->where('status', 1)->paginate(12);
        return view('frontend.product.course', compact('products', 'semester', 'edu'));
    }
}
