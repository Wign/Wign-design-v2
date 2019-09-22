<?php

use Faker\Generator as Faker;

$factory->define(\App\Description::class, function (Faker $faker) {
    $users = App\User::withTrashed()->random();
    $u1 = $users->first();
    $u2 = rand(0, 4) == 0 ? $users->skip(1)->first() : $u1;

    return [
        'text' =>   $faker->realText(),
        'creator_id' => $u1,
        'editor_id' => $u2
    ];
});
