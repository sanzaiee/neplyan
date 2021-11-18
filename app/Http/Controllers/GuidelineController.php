<?php

namespace App\Http\Controllers;

use App\Guideline;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    public function index()
    {
        $title = "List of guidelines";
        $guidelines = Guideline::all();
        return view('dashboard.guideline.index', [
            'title' => $title,
            'guidelines' => $guidelines,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create guideline";
        $guideline = [];
        return view('dashboard.guideline.create', [
            'title' => $title,
            'guideline' => $guideline,
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
            'description1' => 'required|string',
            'description2' => 'required|string',
            'description3' => 'required|string',
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title3' => 'required|string',
        ]);
        $term = new Guideline();
        $term->create($data);
        $request->session()->flash('success', 'Successfully Created');
        return redirect()->route('guideline.index');
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
        $title = "Edit F&Q";
        $guideline = Guideline::findorFail($id);
        return view('dashboard.guideline.create', [
            'title' => $title,
            'guideline' => $guideline,
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
            'description1' => 'required|string',
            'description2' => 'required|string',
            'description3' => 'required|string',
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title3' => 'required|string',
            'status' => 'required',
        ]);

        $term = Guideline::findorFail($id);

        $term->update($data);
        $request->session()->flash('success', 'Guideline successfully updated');
        return redirect()->route('guideline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guideline = Guideline::findorFail($id);
        $guideline->delete();
        session()->flash('danger', 'Guideline deleted successfully');
        return redirect()->back();
    }
}
