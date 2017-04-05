<?php

use App\User;
use App\Post;
use App\Bid;
use App\Pet;
use App\Contract;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
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
        // $bids = Bid::all();
        // $bids_count = $bids->count();
        $posts = Post::all();
        $counter = 0;

        foreach ($posts as $post) {
            $bids = $post->bids;
            if ($bids->isEmpty()) {

            } else {
                // $bid_len = $bid->count();
                // $rand_count = rand(0, $bid_len-1);
                // $succ_bid = $bids[rand_count];
                $rand_bid = $bids->random();
                Contract::create([
                    'signed_under' => $rand_bid->id,
                    'signed_under_post'=> $post->id,
                    'contract_start_at' => Carbon::now(),
                    'contract_end_at' => Carbon::now()
                    ]);
            }
        }

        // for ($i = 0; $i < $bids_count; ++$i) {
        // foreach ($bids as $bid) {
        // 	if ($faker->boolean($chanceOfGettingTrue = 90)) 
        // 	{
        // 		Contract::create([
        // 			'signed_under' => $bid->id,
        //             'signed_under_post'=>
        // 			'contract_start_at' => Carbon::now(),
        // 			'contract_end_at' => Carbon::now()
        // 		]);
        // 	}
        // }
    }
}
