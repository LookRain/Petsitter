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
                    $start_at = $faker->dateTimeThisYear()->date;
                    $end_at = Carbon::parse($start_at)->addWeeks($faker->numberBetween(1, 10));
                    Post::create([
                        'author' => $users[$i]->id,
                        'start_at' => $start_at,
                        'end_at' => $end_at,
                        'description' => $faker->text
                    ]);
                }
            }
        }

    }
}
