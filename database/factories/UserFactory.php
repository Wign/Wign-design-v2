<?php

use App\Role;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $banned = rand(0,19) == 0 ? true : false;
    $role = rand(0,99) == 0 ? Role::where('type','admin')->first()->id : Role::where('type','default')->first()->id;

    $updated_at = $faker->dateTime();
    $tempDate = $faker->dateTime();
    if ($tempDate <= $updated_at)   {
        $created_at = $tempDate;
    } else {
        $created_at = $updated_at;
        $updated_at = $tempDate;
    }

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'last_login' => now(),
        'role_id' => $role,
        'created_at' => $created_at,
        'updated_at' => $banned ? $updated_at : $created_at,
        'deleted_at' => $banned ? $updated_at : null,
        'ban_reason' => $reason = $banned ? $faker->sentence : null
    ];
});
