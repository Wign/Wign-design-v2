<?php

use App\Translation;
use App\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Seeds Likes
     * Here we assumes that we has 90 translations and 75 users from the UserTableSeeder
     *
     * @return void
     */
    public function run()
    {
        $translations = Translation::all()->random(50);
        $users        = User::all()->random(40);

        $translations->each(function (Translation $translation) use ($users) {
            $numLikes = rand(1, 6);
            $selectedUsers = $users->random($numLikes)->pluck('id');

            $translation->likes()->attach($selectedUsers);
        });
    }
}
