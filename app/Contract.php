<?php

namespace App;
use App\Bid;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = [
        'signed_under', 'signed_under_post'
    ];

    public function regardedBid()
    {
    	return $this->belongsTo(Bid::class, 'signed_under');
    }
}
