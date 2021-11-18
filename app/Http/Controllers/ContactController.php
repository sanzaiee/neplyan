<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::where('status', 1)->first();
        return view('frontend.contact', compact('setting'));
    }

    public function indexForAdmin()
    {
        $unread = Contact::where('status', 0)->update(['status' => 1]);
        $message = Contact::all();
        return view('dashboard.contact.index', compact('message'));
    }

    function validateRecaptcha()
    {
        $secret = config('services.recaptcha.secret');
        $captcha = request()->input('g-recaptcha-response');
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
        return $response['success'];
    }


    public function store(Request $request)
    {
        if ($this->validateRecaptcha() == false) return back()->with('error', 'Recaptcha Validation Failed!');

        $data = $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);
        $data['status'] = 0;
        Contact::create($data);
        return back()->with('success', 'Message Sent');
    }
    
   public function status($id){
        $item = Contact::findorfail($id);    
        if($item->status == 0){
            $item['status'] = 1;
            $item->update();
            return view('dashboard.contact.contact-read-message',compact('item'));
        }
            return view('dashboard.contact.contact-read-message',compact('item'));

    }
}
