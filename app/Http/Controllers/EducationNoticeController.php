<?php

namespace App\Http\Controllers;

use App\Education;
use App\EducationNotice;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationNoticeController extends Controller
{
    public function eduIdConverter($slug)
    {
        return Education::where('slug', $slug)->first();
    }

    public function create($eduslug)
    {
        $education = $this->eduIdConverter($eduslug);
        $notices = EducationNotice::where('education_id', $education->id)->get();
        if (!$notices) {
            $notices = [];
        }
        if ($education) {
            return view('dashboard.noticeEdu.create', compact('education', 'notices'));
        } else {
            return "404";
        }
    }

    public function store(Request $request)
    {
        $education = Education::findorFail($request->education_id);
        $request['slug'] = Str::slug($request['name'], '-') . $education->name;
        // return $request;
        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'slug' => 'required',
            'education_id' => 'required'
        ]);

        $notice = new EducationNotice();

        $name = "noticeEdu_img";
        if ($request->hasFile('image')) {

            $data['image'] = $notice->uploadImage($request->image, $name);
        }
        $notice->create($data);
        $request->session()->flash('success', 'Notice Successfully Created');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $notice = EducationNotice::findorFail($id);

        $education = Education::findorFail($request->education_id);
        $request['slug'] = Str::slug($request['name'], '-') . $education->name;

        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'education_id' => 'required'
        ]);

        $name = "noticeEdu_img";

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

        $request->session()->flash('success', 'Notice Successfully Updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $notice = EducationNotice::findorFail($id);

        $notice->delete();

        session()->flash('danger', 'Notice Deleted Successfully');
        return redirect()->back();
    }

    public function noticeAll($eduslug)
    {
        $education = $this->eduIdConverter($eduslug);
        $notices = EducationNotice::where('education_id', $education->id)->where('status', 1)->get();
        return view('frontend.noticeEdu.notice', compact('education', 'notices'));
    }

    public function noticeDetail($noticeslug)
    {
        $notice = EducationNotice::where('slug', $noticeslug)->first();
        $education = Education::findorfail($notice->education_id);
        $notices = EducationNotice::where('status', 1)->where('education_id', $notice->education_id)->where('id', '!=', $notice->id)->get();
        return view('frontend.noticeEdu.notice-detail', compact('education', 'notices', 'notice'));
    }
}
