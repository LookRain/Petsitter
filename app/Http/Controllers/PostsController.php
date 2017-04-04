<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

	// public function __construct()
	// {
	// 	$this->middleware('guest');
	// }

	

	public function index()
    {
        $posts = Post::latest()->get();
    	return view('home', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
	// store to database then redirect to posts page
        $this->validate(request(), [
                'title' => 'required',
                'description' => 'required',
            ]);


        auth()->user()->publish(
                new Post(request(['title', 'description', 'start_at', 'end_at']))
            );
    	

    	return redirect("post");
    }
}
