<?php

namespace App;

use App\User;
use App\Bid;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function bids()
    {
    	return $this->hasMany(Bid::class, 'posted_under');
    }
}
