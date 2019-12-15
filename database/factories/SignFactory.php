<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Language;
use App\Sign;
use App\User;
use Faker\Generator as Faker;

$factory->define(Sign::class, function (Faker $faker) {
    $faker->addProvider(new App\Providers\FakerProvider($faker));

    $url = '//www.cameratag.com/';
    $videoUUID = $faker->unique()->videoUuid; // ATTENTION! It only contains 100 unique entities. Otherwise use $faker->unique()->uuid;

    return [
        'video_uuid'          => $videoUUID,
        'video_url'           => $url.'videos/'.$videoUUID.'/qvga/mp4.mp4',
        'thumbnail_url'       => $url.'assets/'.$videoUUID.'/vga_thumb.png',
        'small_thumbnail_url' => $url.'assets/'.$videoUUID.'/qvga_thumb.jpg',
        'playings'            => $faker->numberBetween(0, 10000),
        'language_id'         => 2,
        'creator_id'          => factory(User::class),
    ];
});
