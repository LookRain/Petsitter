<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;

class PetsController extends Controller
{
    
    public function create()
    {
    	return view('pets.create');
    }

    public function store()
    {
    	auth()->user()->addPet(new Pet(request(['name', 'breed', 'gender', 'age', 'description'])));
    	$user = auth()->user();
    	// return view('profiles.show', compact('user'));
    	return redirect()->action('ProfileController@index', compact('user'));

    }
}
