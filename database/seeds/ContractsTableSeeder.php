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
        $bids = Bid::all();
        $bids_count = $bids->count();


        // for ($i = 0; $i < $bids_count; ++$i) {
        foreach ($bids as $bid) {
        	if ($faker->boolean($chanceOfGettingTrue = 90)) 
        	{
        		Contract::create([
        			'signed_under' => $bid->id,
        			'contract_start_at' => Carbon::now(),
        			'contract_end_at' => Carbon::now()
        		]);
        	}
        }
    }
}
