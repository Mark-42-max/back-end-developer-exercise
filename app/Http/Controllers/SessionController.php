<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
//
    public function store(){
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $existingUser = User::where('email', $credentials['email'])->get();

        if(!empty($existingUser && empty($existingUser->password))){
            throw ValidationException::withMessages([
                'email' => 'You have registered using social login. Please login using social login.',
            ]);

        }

        if (auth()->attempt($credentials)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        return $this->_registerOrSigninUser($user);
    }

    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
        ddd($user->email);
    }

    protected function _registerOrSigninUser($user){
        $currentuser = User::where('email', $user->email)->first();

        if(!empty($currentuser->password)){
            //signin with google but already registered with general authentication
            return redirect('/')->with('error', 'You are already registered with general authentication. Please login with your credentials.');

        }
        if (!$currentuser) {
            $currentuser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->email,
                'is_authorized' => true,
            ]);
        }

        auth()->login($currentuser, true);

        return redirect('/')->with('success', 'Welcome back!');
    }
}
