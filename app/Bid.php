<?php

namespace App;

use App\Pet;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //

    protected $guarded = [];

    public function getPet()
    {
    	return $this->belongsTo(Pet::class, 'pet_on_bid');
    }

    public function getBidder()
    {
    	
    	return $this->getPet->getOwner();
    }

    public function getPost()
    {
        
        return $this->belongsTo(Post::class, 'posted_under');
    }

    // public function addBid()
    // {
    	
    // }
}
