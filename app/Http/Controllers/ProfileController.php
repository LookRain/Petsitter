<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit()
    {
    	$user = auth()->user();
    	return view('profiles.edit', compact('user'));
    }

    public function update()
    {
    	$query = User::latest()->toSql();

    	DB::enableQueryLog();
    	dd($query);
 
    	$user = auth()->user();

    	$user->name = request('name');
    	$user->age = request('age');
    	$user->address = request('address');

    	$user->save();


    	return view('profiles.show', compact('user'));

    }
}
