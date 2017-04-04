<?php

namespace App;

use App\User;
use App\Bid;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['title', 'body', 'start_at', 'end_at'];
    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function bids()
    {
    	return $this->hasMany(Bid::class, 'posted_under');
    }
}
