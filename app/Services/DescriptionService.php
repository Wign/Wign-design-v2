<?php


namespace App\Http\Controllers;


use App\Description;
use App\User;
use Request;

class DescriptionService {

    public function makeDescription(Request $request, User $user) {
        $desc = $this->newDescription($request, $user);

        return $desc;
    }

    public function editDescription(Request $request, \App\Translation $translation, ?\Illuminate\Contracts\Auth\Authenticatable $user) {
        if ($request->input('text') == null) {
            return null;
        }

        $newDesc = $this->newDescription($request, $user);

        return $newDesc;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Description|\Illuminate\Database\Eloquent\Model
     */
    public function newDescription(Request $request, User $user) {
        $this->validate($request, [
            'text'       => 'nullable|string',
        ] );

        $desc = Description::make([
            'text' => $request->input('text'),
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
        return $desc;
    }
}
