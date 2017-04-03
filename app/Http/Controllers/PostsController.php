<?php

namespace petsitter\Http\Controllers;

use petsitter\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
