<?php

use App\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user_1 = new User;
        $user_1->name = 'Lu Yu';
        $user_1->gender = 'male';
        $user_1->age = '23';
        $user_1->address = 'Clementi 462';
        $user_1->email = 'user1@gmail.com';
        $user_1->password = bcrypt('user1');
        $user_1->isAdmin = true;
        $user_1->save();

        $user_2 = new User;
        $user_2->name = 'User2';
        $user_2->gender = 'female';
        $user_2->age = '23';
        $user_1->address = 'Clementi 461';
        $user_2->email = 'user2@gmai.com';
        $user_2->password = bcrypt('user2');
        $user_2->save();


        for ($i = 0; $i < 40; ++$i) {
            //male
            if ($i % 2 == 0) {
                User::create([
                        'name' => $faker->name('male'),
                        'gender' => 'male',
                        'age' => $faker->numberBetween(18,57),
                        'address' => $faker->address,
                        'email' => $faker->email,
                        'password' => bcrypt('password')
                    ]);
            } else {
                User::create([
                        'name' => $faker->name('female'),
                        'gender' => 'female',
                        'age' => $faker->numberBetween(18,57),
                        'address' => $faker->address,
                        'email' => $faker->email,
                        'password' => bcrypt('password')
                    ]);
            }
        }
    }
}
