<?php


namespace App\Http\Controllers;


use App\Description;
use Illuminate\Http\Request;

class DescriptionRepository {
    public function make(Request $request, $user) {
        return Description::make([
            'text' => $request->input('text'),
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }
}
