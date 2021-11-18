<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        $title = "List of terms";
        $terms = Term::all();
        return view('dashboard.terms.index', [
            'title' => $title,
            'terms' => $terms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create terms";
        $term = [];
        return view('dashboard.terms.create', [
            'title' => $title,
            'term' => $term,
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
            'title' => 'required|string',
            'description' => 'required|string',

        ]);
        $term = new Term();
        $term->create($data);
        $request->session()->flash('success', 'Successfully Created');
        return redirect()->route('term.index');
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
        $title = "Edit term";
        $term = Term::find($id);
        return view('dashboard.terms.create', [
            'title' => $title,
            'term' => $term,
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
            'title' => 'required|string',
            'status' => 'required',
            'description' => 'required|string',

        ]);
        $term = Term::findorFail($id);

        $term->update($data);
        $request->session()->flash('success', 'Term successfully updated');
        return redirect()->route('term.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::findorFail($id);

        $term->delete();
        session()->flash('danger', 'term deleted successfully');
        return redirect()->back();
    }
}
