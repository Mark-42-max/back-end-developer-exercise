<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $user = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'max:255', 'min:3', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:8'],
        ]);

        $currentUser = User::create($user);

        auth()->login($currentUser);

        return redirect('/')->with('success', 'Welcome aboard!');
    }

    public function redirectToGoogle(){

    }

    public function redirectToFacebook(){

    }

}
