<?php

use App\User;
use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {

        factory(App\Word::class, 200)->create()->each(function ($word) {
            $UsersTotal = User::count();

            $n1 = random_int(0, $UsersTotal / 2);
            $n2 = random_int(0, $UsersTotal / 2);
            $numUsers = $n1 < $n2 ? $n1 : $n2;

            if ($numUsers > 0) {
                $users = User::inRandomOrder()->limit($numUsers)->get();
                foreach ($users as $user) {
                    $user->requests()->attach($word);
                }
            }
        });
    }
}
