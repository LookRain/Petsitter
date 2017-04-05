<?php

namespace App;
use App\Bid;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //

    public function regardedBid()
    {
    	return $this->belongsTo(Bid::class, 'signed_under');
    }
}
