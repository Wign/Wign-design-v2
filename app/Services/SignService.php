<?php

namespace App\Services;

use App\Http\Requests\SignRequest;
use App\Repositories\LanguageRepository;
use App\Repositories\SignRepository;
use App\Sign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class SignService
{
    private $languageRepository;
    private $signRepository;

    public function __construct(LanguageRepository $languageRepository, SignRepository $signRepository)
    {
        $this->languageRepository = $languageRepository;
        $this->signRepository = $signRepository;
    }

    public function makeSign(SignRequest $request, $user): Sign
    {
        $sign = $this->newSign($request, $user);

        return $sign;
    }

    public function editSign(SignRequest $request, $user): Sign
    {
        if ($request->input('video_uuid') != null) {
            $sign = $this->newSign($request, $user);

            return $sign;
        }

        return null;
    }

    /**
     * @param  SignRequest  $request
     * @param  User  $user
     * @return Sign|Model
     */
    private function newSign(SignRequest $request, User $user): Sign
    {
        $video_uuid = $request->input('video_uuid');
        $video_url = $request->input('video_url');
        $thumbnail_url = $request->input('thumbnail_url');
        $small_thumbnail_url = $request->input('small_thumbnail_url');
        $language = $this->languageRepository->getSigned();

        $sign = $this->signRepository->make($video_uuid, $video_url, $thumbnail_url, $small_thumbnail_url, $language, $user);

        return $sign;
    }

    //TODO delete sign -> place the video with the previous one -- otherwise delete the translatio
}
