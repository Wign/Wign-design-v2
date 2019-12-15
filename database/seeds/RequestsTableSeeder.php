<?php

use App\User;
use App\Word;
use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->random(40);

        $users->each(function (User $user) {
            $user->requests()->attach(factory(Word::class)->create([
                'creator_id' => $user->id,
                'editor_id'  => $user->id,
            ]));
        });
    }
}
