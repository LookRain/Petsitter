<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index(User $user)
    {

		return view('profiles.show', compact('user'));
    }
}
