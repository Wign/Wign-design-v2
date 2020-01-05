<?php

namespace App\Repositories;

use App\Http\Requests\SignRequest;
use App\Language;
use App\Sign;
use Illuminate\Foundation\Auth\User;

class SignRepository
{
    public function find($id)
    {
        return Sign::find($id);
    }

    public function make(SignRequest $request, Language $language, User $user): Sign
    {
        return Sign::make([
            'video_uuid' => $request->input('video_uuid'),
            'video_url' => $request->input('video_url'),
            'thumbnail_url' => '',
            'small_thumbnail_url' => '',
            'language_id' => $language->id,
            'creator_id' => $user->id,
        ]);
    }
}
