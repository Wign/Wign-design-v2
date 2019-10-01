<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Description;
use App\Sign;
use App\Translation;
use App\User;
use App\Word;

// WARNING! This method at pure creates 7 unique users! Use this if you know what to do!
$factory->define(Translation::class, function () {
    return [
        'description_id' => factory(Description::class),
        'word_id'        => factory(Word::class),
        'sign_id'        => factory(Sign::class),
        'creator_id'     => factory(User::class),
        'editor_id'      => factory(User::class),
    ];
});
