<?php

namespace petsitter;

use petsitter\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
