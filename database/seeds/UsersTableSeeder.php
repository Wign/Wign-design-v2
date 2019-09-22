<?php

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
        $MAX_LEVEL = \App\Level::max('rank');

        factory(App\User::class, 100)->create()->each(function($u) use ($MAX_LEVEL) {
            $rankID = rand(1, $MAX_LEVEL+1); //TODO: Need to fix the levels
            $challenge = rand(1, $MAX_LEVEL+1);
            $rankID = $rankID >= $challenge ? $challenge : $rankID;

            $u->qcvs()->attach($rankID);

            while ($rankID > 1) {
                $u->qcvs()->detach();
                if (rand(0, 9) == 0 && $rankID < $MAX_LEVEL+1)  {
                    $rankID++;
                } else {
                    $rankID--;
                }
                $u->qcvs()->attach($rankID);
            }
        });

        $user = new \App\User([
            'name' => 'admin',
            'email' => 'a@a.dk',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
            'role_id' => '2',
            'last_login' => now(),
        ]);
        $user->save();
        //$user->qcvs()->attach(factory(App\Level::class)->make(['rank' => 5]));

        for ($i = 0; $i <= config('global.rank_max'); $i++) {
            $user = new \App\User([
                'name' => 'user',
                'email' => $i . '@u.dk',
                'password' => bcrypt('user'),
                'remember_token' => str_random(10),
                'role_id' => '1',
                'last_login' => now(),
        ]);
        $user->save();
        //$user->qcvs()->attach(factory(App\Level::class)->make(['rank' => $i]));
        }
    }
}
