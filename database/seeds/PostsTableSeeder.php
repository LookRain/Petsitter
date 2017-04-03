<?php

use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::all();
        $userCount = $users->count();

        for ($i = 0; $i < $userCount; ++$i)
        {
            if ($faker->boolean($chanceOfGettingTrue = 60)) {
                for ($j=0; $j < $faker->numberBetween(1, 5); $j++) {
                    $start_at = $faker->dateTimeThisYear();
                    $started_at = Carbon::instance($start_at);
                    $end_at = Carbon::now()->addWeeks($faker->numberBetween(1, 10));
                    //$end_at = Carbon::parse($end_at);
                  
                    // $end_at = $faker->dateTime('2017-02-29 08:37:17');
                    Post::create([
                        'author' => $users[$i]->id,
                        'start_at' => $started_at,
                        'end_at' => $end_at,
                        'description' => $faker->realtext,
                    ]);
                }
            }
        }

    }
}
