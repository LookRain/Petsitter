<?php

namespace App;

use App\Pet;
use App\Post;
use App\Bid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'age', 'address', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author');
    }

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner');
    }

    public function bids()
    {
        return $this->hasManyThrough(Bid::class, Post::class, 'author', 'posted_under');
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
        // $post->save();  
    }

    public function offer(Bid $bid)
    {
        // $bid = Bid::create(); 
        // $this->bids()->save($bid);
        $bid->save();
    }

    public function addPet(Pet $pet)
    {
        $this->pets()->save($pet);
        // $post->save();  
    }
}