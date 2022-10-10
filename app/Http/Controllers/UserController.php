<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    public function show(User $username){
        if($username->admin == 1){
            abort(403);
        }
        $uid = $username->id;
        $relatedPosts = Post::whereIn('user_id', [$uid])->get();
        $returnData = ['userData' => $username, 'postDetails' => $relatedPosts];
        return view('users.userDetails', [
            'returnData' => $returnData
        ]);
    }

    public function showAdmin(){
        $user = User::where('admin', 1)->get();
        //ddd($user);
        if($user->isEmpty()){
            echo "No admins";
        }else {
            $relatedPosts = Post::whereIn('user_id', [$user[0]->id])->get();
            $returnData = ['userData' => $user[0], 'postDetails' => $relatedPosts];
            return view('users.userDetails', [
                'returnData' => $returnData
            ]);
        }
    }
}
