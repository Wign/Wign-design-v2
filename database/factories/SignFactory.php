<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sign;
use App\User;
use Faker\Generator as Faker;

$factory->define(Sign::class, function (Faker $faker) {
    $url       = '//www.cameratag.com/';
    $videoUUID = 'v-'.$faker->uuid;

    return [
        'video_uuid'          => $videoUUID,
        'video_url'           => $url.'videos/'.$videoUUID.'/qvga/mp4.mp4',
        'thumbnail_url'       => $url.'assets/'.$videoUUID.'/vga_thumb.png',
        'small_thumbnail_url' => $url.'assets/'.$videoUUID.'/qvga_thumb.jpg',
        'playings'            => $faker->numberBetween(0, 10000),
        'sign_language_id'    => 1,
        'creator_id'          => factory(User::class),
    ];
});
