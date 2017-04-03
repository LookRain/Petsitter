<?php

use App\User;
use App\Post;
use App\Bid;
use App\Pet;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        $faker = Factory::create();
        $posts = Post::all();
        $users = User::all();
        
        $postCount = $posts->count();

        $pets = Pet::all();
        $petsCount = Pet::all()->count();

        $initial_counter = 1;
        for ($i = 0; $i < $postCount; ++$i) {

            for ($j = 0; $j < $petsCount; ++$j) {
                if ($faker->boolean($chanceOfGettingTrue = 10)) {
                    Bid::create([
                    'posted_under' => $posts[$i]->id, //  the caretaker's post
                   // 'bidded_by' => $users[$bidder_id]->id,          // care seeker's id
                    'pet_on_bid' => $pets[$j]->id,
                    'start_at' => Carbon::now(),
                    'end_at' => Carbon::now(),
                    'bid_price' => $faker->numberBetween(10, 100),
                    'bid_message' => $faker->realtext
                ]);
                }
                
            }
            
            

            

        }
    }
}
