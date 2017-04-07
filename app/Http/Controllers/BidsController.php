<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Post;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    //
    public function store(Post $post)
    {

        $this->validate(request(), [
                'pet' => 'required',
                'price' => 'required'
            ]);
    	// $this->validate(request(), [
     //            'title' => 'required',
     //            'description' => 'required',
     //        ]);

        // auth()->user()->offer(
        //     new Bid(request(['pet', 'price', 'description', 'start_at', 'end_at']))
        // );

        auth()->user()->offer(Bid::create([
        	'pet_on_bid' => request('pet'),
        	'posted_under' => $post->id,
        	'bid_price' => request('price'),
        ]));
        
    	return back();
    }
}
