<?php

namespace App\Services;

use App\Description;
use App\Http\Requests\DescriptionRequest;
use App\Repositories\DescriptionRepository;
use App\Translation;
use App\User;
use Illuminate\Database\Eloquent\Model;

class DescriptionService
{
    private $repository;

    public function __construct(DescriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function makeDescription(DescriptionRequest $request, $user): Description
    {
        $desc = $this->newDescription($request, $user);

        return $desc;
    }

    public function editDescription(DescriptionRequest $request, Translation $translation, $user): Description
    {
        if ($this->isChanged($request, $translation->description)) {
            $newDesc = $this->newDescription($request, $user);

            return $newDesc;
        }

        return null;
    }

    /**
     * @param  DescriptionRequest  $request
     * @param  User  $user
     * @return Description|Model
     */
    private function newDescription(DescriptionRequest $request, User $user): Description
    {
        $text = $request->input('text');

        $desc = $this->repository->make($text, $user);

        return $desc;
    }

    /**
     * @param  DescriptionRequest  $request
     * @param  Description  $description
     * @return bool
     */
    private function isChanged(DescriptionRequest $request, Description $description): bool
    {
        return $request->input('text') != $description->text;
    }
}
