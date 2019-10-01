<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    $faker->addProvider(new App\Providers\FakerProvider($faker));

    return [
        'literal'     => $faker->unique()->wignWords(),
        'language_id' => 1,
        'creator_id'  => factory(User::class),
        'editor_id'   => factory(User::class),
    ];
});
