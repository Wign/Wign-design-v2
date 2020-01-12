<?php

namespace App\Repositories;

use App\Description;
use App\Http\Requests\DescriptionRequest;

class DescriptionRepository
{
    public function make(string $text, $user): Description
    {
        return Description::make([
            'text' => $text,
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }
}
