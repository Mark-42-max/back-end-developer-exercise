<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $username){
        $uid = $username->id;
        $relatedPosts = Post::whereIn('user_id', [$uid])->get();
        $returnData = ['userData' => $username, 'postDetails' => $relatedPosts];
        return view('users.userDetails', [
            'returnData' => $returnData
        ]);
    }
}
