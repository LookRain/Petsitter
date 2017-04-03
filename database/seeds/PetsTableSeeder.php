<?php

use App\Pet;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // User::all()->each(function ($u) {
        //     $u->pets()->save(factory(Pet::class)->make());
        // });
        $users = User::all();
        $userCount = $users->count();

        for ($i = 0; $i < $userCount; ++$i)
        {
            if ($faker->boolean($chanceOfGettingTrue = 60)) {
                for ($j=0; $j < $faker->numberBetween(1, 5); $j++) {
                
                    Pet::create([
                        'owner' => $users[$i]->id,
                        'name' => $faker->lastname,
                        'breed' => $faker->city,
                        'description' => $faker->text,
                        'age' => $faker->numberBetween(0,50),
                        'gender' => $faker->randomElement(['male','female']),

                    ]);
                }
            }
        }
       

    }
}
