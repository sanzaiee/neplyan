<?php

namespace App\Http\Controllers;

use App\Notifications\PasswordResetNotification;
use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ClientForgetPasswordController extends Controller
{
    public function showLinkRequestForm(){
        return view('client.passwords.email');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $user = Client::where('email',$request->email)->first();
        if($user){
            $user->notify(new PasswordResetNotification());
            // Mail::to($request->user())->send(new MailableClass);
        }else{
            return back()->with('danger','We cant find a user with that email address.');
        }

        return back()->with('success','Please check your email!!');

    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }



    public function showResetForm(Request $request, $token = null)
    {

        $request['token'] = $token;
        $data = $request->all();
        return view('client.passwords.reset')->with('data',$data
            // ['token' => $token, 'email' => $request->email]
        );
    }


    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $user = Client::where('email',$request->email)->first();
        if($user){
            $this->setUserPassword($user, $request->password);

            $user->save();

            if(Auth::guard('client')->attempt(['email' => $user['email'],'password' => $request->password]))
            {
                return redirect()->route('home')->with('success','Welcome To Nepalyan');
            }else{
                return "invalid 2222";
            }


            // $this->guard('vendor')->login($user);
        }
        else{
                return "error";
        }


    }


    protected function rules()
    {
        return [
            // 'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    protected function validationErrorMessages()
    {
        return [];
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }



    protected function guard()
    {
        return Auth::guard();
    }


}
