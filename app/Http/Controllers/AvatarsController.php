<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarsController extends Controller
{
    //
    public function store(Request $request) 
    {
    	// $ = request('avatar');
    	// $file->store('avatars');
    	$path = $request->file('avatar')->store('avatars');
    }
}
