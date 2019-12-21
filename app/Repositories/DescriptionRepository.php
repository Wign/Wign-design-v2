<?php

namespace App\Http\Controllers;

use App\Description;

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
