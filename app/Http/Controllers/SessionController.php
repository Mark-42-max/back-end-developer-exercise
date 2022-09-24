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
        ddd($user);

        //$this->_registerOrLoginUser($user);
    }

    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
        ddd($user);

        //$this->_registerOrLoginUser($user);
    }

    protected function _registerOrLoginUser($user){
        $authUser = User::where('email', $user->email)->first();

        if (!$authUser) {
            $authUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->email,
            ]);
        }

        auth()->login($authUser);

        return redirect('/')->with('success', 'Welcome aboard!');
    }
}
