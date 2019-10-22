<?php

use App\Flight;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create()->each(function ($user) {
            $user->Posts()->save(factory(Post::class)->make());
            $user->Flights()->save(factory(Flight::class)->make());
        });
    }
}
