<?php

namespace App\Http\Controllers;

use App\Level;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    public $material;

    public function __construct(Material $material)
    {
        $this->middleware('auth');
        $this->middleware('admin.access')->except('create');
        $this->material = $material;
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

    public function forMaterialId($material)
    {

        // $matId = Level::where('slug', $material)->first();
        $matId = $this->material->where('slug', $material)->first();
        return $matId->id;
    }

    public function create($material)
    {

        $material_id = $this->forMaterialId($material);
        $materials = Material::findorFail($material_id);
        $levels = Level::where('material_id', $material_id)->orderBy('position','asc')->get();
        return view('dashboard.level.create', compact('levels', 'material', 'materials'));
    }

    public function create1()
    {
        $levels = Level::where('status', 1)->get();
        return view('dashboard.level.create1', compact('levels', 'material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']) . '-' . $request->material_id; //material_id  carries material slug
        $request['material_id'] = $this->forMaterialId($request->material_id);
        $data = $this->validate($request, [
            'name' => 'required',
            'material_id' => 'required',
            'slug' => 'required',
            'position' => 'nullable',

        ]);

        Level::create($data);
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
        $level = Level::findorFail($id);

        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:levels,slug,'.$id,
            // 'material_id' => 'required',
            'position' => 'nullable',

        ]);
        
        $level->update($data);
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
        $level = Level::findorFail($id);

        $level->delete();
        session()->flash('danger', 'Level Deleted Successfully');
        return redirect()->back();
    }
}
