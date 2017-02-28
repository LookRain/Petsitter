<?php

use App\Pet;
use App\User;
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
        // User::all()->each(function ($u) {
        //     $u->pets()->save(factory(Pet::class)->make());
        // });
    }
}
