<?php

use Faker\Generator as Faker;

$factory->define(\App\Translation::class, function (Faker $faker) {
    if (random_int(0, 19) == 0 && \App\Word::count() != 0)   {
        $word = \App\Word::inRandomOrder()->first();
    } else {
        $word = factory(\App\Word::class)->create();
    }
    $video = factory(\App\Video::class)->create();
    $description = factory(\App\Description::class)->create();

    $user = \App\User::inRandomOrder()->first();
    $editor = random_int(0,2) == 0 ? $user : \App\User::inRandomOrder()->first();
    return [
        //
    ];
});
