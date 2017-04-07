<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

    	$is_keyword_entered = !is_null(request('keyword'));
    	$is_start_entered = !is_null(request('start_at'));
    	$is_end_entered = !is_null(request('end_at'));
    	$is_available_checked = !is_null(request('check'));
    	$is_min_entered = !is_null(request('min'));
    	$is_max_entered = !is_null(request('max'));

    	// if ($is_start_entered) {
    	// 	$this->validate($request, [
    	// 		'end_at' => 'required'
    	// 	],
    	// 	[
    	// 		'end_at.required' => 'Starting date must be follwed by'
    	// 	]);
    	// }

    	

		$order_by = request('orderby');	
		/*
		default: 1 => recent
		2 => cheapest
		3 => Name
		*/
		$q = Post::query();


		if ($is_keyword_entered) {
			$keyword = request('keyword');
			$q->where('description', 'LIKE', "%$keyword%");	
		}

		if ($is_start_entered) {
			$start_at = request('start_at');
			$q->where('start_at', '>=', "$start_at");	
		}

		if ($is_end_entered) {
			$end_at = request('end_at');
			$q->where('end_at', '<=', "$end_at");	
		}

		if ($is_min_entered) {
			$min = request('min');
			$q->where('listing_price', '>=', "$min");	
		}
		if ($is_max_entered) {
			$max = request('max');
			$q->where('listing_price', '<=', "$max");	
		}

		if ($is_available_checked) {
			$q->havingRaw('NOT EXISTS ( SELECT * FROM contracts c WHERE c.signed_under_post = posts.id)');
		}
		

		if ($order_by == 1) {
			$q->latest();
		} elseif ($order_by == 2) {
  			$q->orderBy('listing_price', 'asc');
		} 

		if ($order_by == 3) {
			$q->join('users', 'users.id', '=', 'posts.author')
			->orderBy('users.name', 'asc');
		}
		
    	$posts = $q->get();
    	
    	return view('posts.result', compact('posts'));
    	
    }

}
