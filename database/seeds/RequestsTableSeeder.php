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
        $UsersTotal = User::count();

        factory(App\Word::class, 200)->create()->each(function ($word) use ($UsersTotal) {

            $n1 = rand(0, $UsersTotal / 2);
            $n2 = rand(0, $UsersTotal / 2);
            $numUsers = $n1 < $n2 ? $n1 : $n2;

            if ($numUsers > 0) {
                $users = User::random()->limit($numUsers)->get();
                foreach ($users as $user) {
                    $user->requests()->attach($word);
                }
            }
        });
    }
}
