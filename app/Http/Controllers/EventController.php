<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $title = "List of Events";
        $events = Event::all();
        return view('dashboard.event.index', [
            'title' => $title,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Event";
        $event = [];
        return view('dashboard.event.create', [
            'title' => $title,
            'event' => $event,
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
        $request['slug'] = Str::slug($request['name'], '-');

        $data = $this->validate($request, [
            'maplink' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'onDate' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
            'address' => 'required',
            // 'publish'=>'required|string',
        ]);

        $notice = new Event();
        $name = "notice_img";
        if ($request->hasFile('image')) {

            $data['image'] = $notice->uploadImage($request->image, $name);
        }

        $notice->create($data);
        $request->session()->flash('success', 'Event Successfully created');
        return redirect()->route('event.index');
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
        $title = "Edit notice";
        $event = Event::findorFail($id);
        return view('dashboard.event.create', [
            'title' => $title,
            'event' => $event,
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
        $request['slug'] = Str::slug($request['name'], '-');
        $data = $this->validate($request, [
            'maplink' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'onDate' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);
        $notice = Event::findorFail($id);
        $name = "notice_img";

        if (!$request->image == null) {

            $data['image'] = $notice->uploadimage($request->image, $name);
            $image = $notice->image;
            $path = public_path($name);
            $cut = explode('/', $image);
            if ($cut == [""]) {
                $notice->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $notice->update($data);
            }
        } else {
            $data['image'] = $notice->image;
            $notice->update($data);
        }

        // $notice->update($data);
        $request->session()->flash('success', 'Event Successfully Updated');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Event::find($id);

        $notice->delete();
        session()->flash('danger', 'Event Deleted Successfully');
        return redirect()->back();
    }
}
