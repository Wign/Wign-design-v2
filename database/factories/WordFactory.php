<?php

use Faker\Generator as Faker;

$factory->define(App\Word::class, function (Faker $faker) {
    $users = App\User::withTrashed()->random();
    $u1 = $users->first();
    $u2 = rand(0, 4) == 0 ? $users->skip(1)->first() : $u1;
    $l = rand(0, 100) > 0 ? \App\Language::whereCode('da_DK')->first() : \App\SignLanguage::random()->first();

    return [
        'literal' => $faker->unique()->word,
        'language_id' => $l,
        'creator_id' => $u1->id,
        'editor_id' => $u2->id
    ];
});
