<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth')->except('index');
	}

	

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

        // auth()->user()->publish(Post::create([
        //     'description' => request('description'),
        //     'author' => auth()->user()->id,
        //     'title' => request('title'),
        //     'start_at' => request('start_at'),
        //     'end_at' => request('end_at')
        //     ]));
        // dd(DB::getQueryLog());
        // $post = new Post(request(['start_at', 'end_at', 'title', 'description']));
        auth()->user()->publish(
                new Post(request(['start_at', 'end_at', 'title', 'description']))
            );
        // dd($post);
    	

    	return redirect("post");
    }
}
