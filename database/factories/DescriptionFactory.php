<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Description;
use App\User;
use Faker\Generator as Faker;

$factory->define(Description::class, function (Faker $faker) {
    //$faker->addProvider(new App\Providers\FakerProvider($faker)); Later...

    return [
        //'text'     => $faker->textWithHashtag(), Later...
        'text'       => $faker->realText(),
        'creator_id' => factory(User::class),
        'editor_id'  => factory(User::class),
    ];
});
