<?php

use Faker\Generator as Faker;

$factory->define(\App\Sign::class, function (Faker $faker) {
    $url = "//www.cameratag.com/";
    $videoUUID = "v-" . $faker->uuid;
    $user = \App\User::withTrashed()->inRandomOrder()->first();
    $sl = random_int(0, 1000) > 0 ? \App\SignLanguage::whereCode('dts_DK')->first() : \App\SignLanguage::inRandomOrder()->first();

    return [
        'video_uuid'          => $videoUUID,
        'video_url'           => $url . "videos/" . $videoUUID . "/qvga/mp4.mp4",
        'thumbnail_url'       => $url . "assets/" . $videoUUID . "/vga_thumb.png",
        'small_thumbnail_url' => $url . "assets/" . $videoUUID . "/qvga_thumb.jpg",
        'playings'            => rand(0,10000),
        'sign_language_id'    => $sl->id,
        'user_id'             => $user->id
    ];
});
