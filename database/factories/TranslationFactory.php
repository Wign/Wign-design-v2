<?php

use Faker\Generator as Faker;

$factory->define(\App\Translation::class, function (Faker $faker) {
    $desc = factory(\App\Description::class)->create();

    return[
        //'word_id' => ,
        //'sign_id' => ,
        'description_id' => $desc->id,
        'creator_id' => $desc->creator_id,
        'editor_id' => $desc->editor_id
        ];
});
