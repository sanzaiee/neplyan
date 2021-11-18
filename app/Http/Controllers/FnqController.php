<?php

namespace App\Http\Controllers;

use App\Fnq;
use Illuminate\Http\Request;

class FnqController extends Controller
{
    public function index()
    {
        $title = "List of fnqs";
        $fnqs = Fnq::all();
        return view('dashboard.fnq.index', [
            'title' => $title,
            'fnqs' => $fnqs,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Fnq";
        $fnq = [];
        return view('dashboard.fnq.create', [
            'title' => $title,
            'fnq' => $fnq,
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
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        $term = new Fnq();
        $term->create($data);
        $request->session()->flash('success', 'Successfully Created');
        return redirect()->route('fnq.index');
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
        $fnq = Fnq::findorFail($id);
        return view('dashboard.fnq.create', [
            'title' => $title,
            'fnq' => $fnq,
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
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required',
        ]);

        $term = Fnq::findorFail($id);

        $term->update($data);
        $request->session()->flash('success', 'F&Q successfully updated');
        return redirect()->route('fnq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fnq = Fnq::findorFail($id);
        $fnq->delete();
        session()->flash('danger', 'term deleted successfully');
        return redirect()->back();
    }
}
