<?php

namespace App\Http\Controllers;

use App\Description;
use App\Translation;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DescriptionService
{
    private $repository;

    public function __construct(DescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function makeDescription(Request $request, User $user): Description
    {
        $desc = $this->newDescription($request, $user);

        return $desc;
    }

    public function editDescription(Request $request, Translation $translation, $user): Description
    {
        if ($this->isChanged($request, $translation->description)) {
            $newDesc = $this->newDescription($request, $user);

            return $newDesc;
        }
        return null;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return Description|Model
     */
    private function newDescription(Request $request, User $user): Description
    {
        $this->validateDescription($request);
        $text = $request->input('text');
        $desc = $this->repository->make($text, $user);

        return $desc;
    }

    /**
     * @param Request $request
     * @param Description $description
     * @return bool
     */
    private function isChanged(Request $request, Description $description): bool
    {
        return $request->input('text') != $description->text;
    }

    /**
     * @param Request $request
     */
    private function validateDescription(Request $request): void
    {
        $this->validate($request, [
            'text' => 'nullable|string',
        ]);
    }
}
