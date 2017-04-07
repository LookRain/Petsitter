<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Bid;

class Notification extends Model
{
    //
    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function bid()
    {
    	return $this->belongsTo(Bid::class, 'bid_id');
    }
}
