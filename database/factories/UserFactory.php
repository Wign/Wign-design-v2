<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $created_at = $faker->dateTime();

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->safeEmail,
        'password'   => Hash::make($faker->password),
        'created_at' => $created_at,
        'updated_at' => $created_at,
        'last_login' => $faker->dateTimeBetween($created_at, 'now'),
        'role_id'    => 1,
    ];
});

$factory->state(User::class, 'verified', function (Faker $faker) {
    return [
        'email_verified_at' => $faker->dateTime()->add(DateInterval::createFromDateString('yesterday')), // Yesterday = -1 day. Thus "add" is used
    ];
});

$factory->state(User::class, 'admin', [
    'role_id' => 2,
]);
