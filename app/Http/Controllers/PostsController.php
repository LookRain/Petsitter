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

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
