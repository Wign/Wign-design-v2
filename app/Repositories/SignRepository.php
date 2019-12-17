<?php


namespace App\Http\Controllers;


use App\Language;
use App\Sign;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class SignRepository {
    public function make(Request $request, Language $language, User $user)
    {
        return Sign::make([
            'video_uuid' => $request->input('video_uuid'),
            'video_url' => $request->input('video_url'),
            'thumbnail_url' => $request->input('thumbnail_url'),
            'small_thumbnail_url' => $request->input('small_thumbnail_url'),
            'language_id' => $language->id,
            'creator_id' => $user->id,
        ]);
    }
}
