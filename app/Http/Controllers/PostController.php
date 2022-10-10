<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(8),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all(),
        ]);
    }

    public function show($username, Post $post) {

        $category_id = (Category::where('name', $post->category->name)->get())[0]->getAttributes()['id'];
        return view('post', [
            'post' => $post,
            'relatedPosts' => Post::where('category_id', $category_id)->where('id', '!=', $post->id)->get(),
        ]);
    }

    public function create(){
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function make(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        $attributes['user_id'] = auth()->user()->id;

        $attributes['slug'] = Str::slug($attributes['title'].now(), '-');

        Post::create($attributes);

        return redirect('/')->with('success', 'Post created successfully!');
    }

}
