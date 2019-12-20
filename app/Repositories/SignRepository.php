<?php

namespace App\Http\Controllers;

use App\Language;
use App\Sign;
use Illuminate\Foundation\Auth\User;

class SignRepository
{
    public function find($id)
    {
        return Sign::find($id);
    }

    public function make(string $video_uuid, string $video_url, string $thumbnail_url, string $small_thumbnail_url, Language $language, User $user): Sign
    {
        return Sign::make([
            'video_uuid' => $video_uuid,
            'video_url' => $video_url,
            'thumbnail_url' => $thumbnail_url,
            'small_thumbnail_url' => $small_thumbnail_url,
            'language_id' => $language->id,
            'creator_id' => $user->id,
        ]);
    }
}
