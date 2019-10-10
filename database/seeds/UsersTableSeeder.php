<?php

use App\Description;
use App\Sign;
use App\Translation;
use App\User;
use App\Word;
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
        // First create some default users:
        factory(User::class)->states('verified', 'admin')->create([
                'name'     => 'admin',
                'email'    => 'admin@wign.dk',
                'password' => Hash::make('pass'),
            ]
        );

        factory(User::class)->state('verified')->create([
                'name'     => 'user',
                'email'    => 'user@wign.dk',
                'password' => Hash::make('pass'),
            ]
        );

        // Lurkers (People with no content creations whatsoever)
        factory(User::class, 50)->create();

        // 10 new user, 1 video each
        $this->seedUsersAndTranslations(10, 1);

        // 10 new user, 2 videos each
        $this->seedUsersAndTranslations(10, 2);

        // 3 new user, 20 videos each
        $this->seedUsersAndTranslations(3, 20);
    }

    private function seedUsersAndTranslations(int $numUser, int $numTranslations)
    {
        factory(User::class, $numUser)->create()->each(function (User $user) use ($numTranslations) {
            for ($i = 0; $i < $numTranslations; $i++) {
                factory(Translation::class)->create([
                    'description_id' => factory(Description::class)->create([
                        'creator_id' => $user->id,
                        'editor_id'  => $user->id,
                    ])->id,
                    'word_id'        => factory(Word::class)->create([
                        'creator_id' => $user->id,
                        'editor_id'  => $user->id,
                    ])->id,
                    'sign_id'        => factory(Sign::class)->create([
                        'creator_id' => $user->id,
                    ])->id,
                    'creator_id'     => $user->id,
                    'editor_id'      => $user->id,
                ]);
            }
        });
    }
}
