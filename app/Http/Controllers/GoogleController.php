<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        $userSocial = Socialite::driver('google')->stateless()->user();

        // $finduser = User::where('google_id', $user->id)->first();

        $finduser = User::where('email', $userSocial->email)->first();

        if ($finduser) {
            Auth::login($finduser);

            return redirect('/');
        } else {
            // $newUser = User::create([
            //     'name' => $user->name,
            //     'email' => $user->email,
            //     // 'google_id'=> $user->id,
            //     'password' => encrypt('123456dummy')
            // ]);
            $user = new User();
            $user->name = $userSocial->id;
            $user->email = $userSocial->email;
            $user->password = bcrypt('password');
            $user->save();

            Auth::login($user);


            // Auth::login($newUser);

            return redirect('/');
        }

        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
