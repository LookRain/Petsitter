<?php

use App\User;
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

        }

    }
}
