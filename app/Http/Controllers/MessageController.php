<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function create(Request $request) {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);
        }catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Please enter the correct details in the form'
            ]);
        }

        $user_id = User::where('email', $request->email)->first()->id;

        $messageArray = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => $user_id,
        ];

        Message::create($messageArray);

        return back()->with('success', 'Thanks for your message. We\'ll be in touch.');
    }
}
