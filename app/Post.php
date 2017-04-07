<?php

namespace App;

use App\User;
use App\Bid;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['title', 'description', 'start_at', 'end_at', 'listing_price'];
    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author');
    }


    public function bids()
    {
    	return $this->hasMany(Bid::class, 'posted_under');
    }

    public function signed_contract()
    {
    	return $this->hasOne(Contract::class, 'signed_under_post');
    }
}
