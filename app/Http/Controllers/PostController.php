<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post) {

        $category_id = (Category::where('name', $post->category->name)->get())[0]->getAttributes()['id'];
        return view('post', [
            'post' => $post,
            'relatedPosts' => Post::where('category_id', $category_id)->get(),
        ]);
    }

}
