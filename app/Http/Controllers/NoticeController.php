<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index()
    {
        $title = "List of Notices";
        $notices = Notice::where('status', '1')->get();
        return view('dashboard.notice.index', [
            'title' => $title,
            'notices' => $notices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create notices";
        $notice = [];
        return view('dashboard.notice.create', [
            'title' => $title,
            'notice' => $notice,
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
            'content' => 'required',
            'name' => 'required|string',
            'slug' => 'required|string',
            'fordate' => 'required',
            'contentType' => 'required',
            // 'publish'=>'required|string',
        ]);

        $notice = new Notice();
        $name = "notice_img";
        if ($request->hasFile('content')) {

            $data['content'] = $notice->uploadImage($request->content, $name);
        }

        $notice->create($data);
        $request->session()->flash('success', 'New notice successfully created');
        return redirect()->route('notice.index');
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
        $notice = Notice::find($id);
        return view('dashboard.notice.create', [
            'title' => $title,
            'notice' => $notice,
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'fordate' => 'required',
            'contentType' => 'required',
            // 'publish'=>'required|string',
        ]);
        $notice = Notice::find($id);
        $name = "notice_img";

        if (!$request->content == null) {

            $data['content'] = $notice->uploadImage($request->content, $name);
            $content = $notice->content;
            $path = public_path($name);
            $cut = explode('/', $content);
            if ($cut == [""]) {
                $notice->update($data);
            } else {
                unlink($path . '/' . $cut[4]);
                $notice->update($data);
            }
        } else {
            $data['content'] = $notice->content;
            $notice->update($data);
        }

        // $notice->update($data);
        $request->session()->flash('success', 'Notice Successfully Updated');
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);

        $notice->delete();
        session()->flash('danger', 'Notice Deleted Successfully');
        return redirect()->back();
    }
}
