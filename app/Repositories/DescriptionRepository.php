<?php

namespace App\Repositories;

use App\Description;
use App\Http\Requests\DescriptionRequest;

class DescriptionRepository
{
    public function make(DescriptionRequest $request, $user): Description
    {
        return Description::make([
            'text' => $request->input('text'),
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }
}
