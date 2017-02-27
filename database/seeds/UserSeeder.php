<?php

use App\User;
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
        $user_1 = new User;
        $user_1->name = 'User1';
        $user_1->email = 'user1@gmail.com';
        $user_1->password = bcrypt('user1');
        $user_1->isAdmin = true;
        $user_1->save();

        $user_2 = new User;
        $user_2->name = 'User2';
        $user_2->email = 'user2@gmai.com';
        $user_2->password = bcrypt('user2');
        $user_2->save();

        factory(User::class, 20)->create();
    }
}
