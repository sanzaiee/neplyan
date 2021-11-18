<?php

namespace App\Http\Controllers;

use App\Heading;
use App\Subject;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
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
    public function create($subject)
    {
        $subject = Subject::findorFail($subject);
        $headings = Heading::where('subject_id', $subject->id)->where('status', 1)->get();
        return view('dashboard.heading.create', compact('subject', 'headings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string',
            'heading' => 'required|string',
            'subject_id' => 'required|string',
        ]);

        Heading::create($data);

        $request->session()->flash('success', 'Successfully Created');

        return redirect()->route('add.book.content', $request->subject_id);
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
        $heading = Heading::findorFail($id);

        $data = $this->validate($request, [
            'title' => 'required|string',
            'heading' => 'required|string',
            'subject_id' => 'required|string',
        ]);

        $heading->update($data);

        $request->session()->flash('success', 'Successfully Updated');

        return redirect()->route('add.book.content', $request->subject_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heading = Heading::findorFail($id);
        $heading->delete();
        session()->flash('danger', 'Heading deleted successfully');
        return redirect()->back();
    }
}
