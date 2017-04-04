<?php

namespace App;

use App\User;
use App\Pet;
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

    // public function addBid()
    // {
    	
    // }
}
