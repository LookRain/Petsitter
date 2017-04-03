<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //
    public function getBidder()
    {
    	return $this->belongsTo(User::class, 'bidded_by');
    }

    // public function addBid()
    // {
    	
    // }
}
