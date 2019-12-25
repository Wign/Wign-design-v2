<?php

namespace App\Services;

use App\Repositories\LanguageRepository;
use App\Repositories\SignRepository;
use App\Sign;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class SignService
{
    private $languageRepository;
    private $signRepository;

    public function __construct(LanguageRepository $languageRepository, SignRepository $signRepository)
    {
        $this->languageRepository = $languageRepository;
        $this->signRepository     = $signRepository;
    }

    public function makeSign(Request $request, $user): Sign
    {
        $sign = $this->newSign($request, $user);

        return $sign;
    }

    public function editSign(Request $request, $user): Sign
    {
        if ($request->input('video_uuid') != null) {
            $sign = $this->newSign($request, $user);

            return $sign;
        }

        return null;
    }

    /**
     * @param Request $request
     * @param $user
     * @return Sign|\Illuminate\Database\Eloquent\Model
     */
    private function newSign(Request $request, User $user): Sign
    {
        $this->validateSign($request);

        $language = $this->languageRepository->getSigned();
        $sign     = $this->signRepository->make(
            $request->input('video_uuid'),
            $request->input('video_url'),
            $request->input('thumbnail_url'),
            $request->input('small_thumbnail_url'),
            $language,
            $user
        );

        return $sign;
    }

    //TODO delete sign -> place the video with the previous one -- otherwise delete the translation

    /**
     * @param Request $request
     */
    private function validateSign(Request $request): void
    {
        $this->validate($request, [
            'video_uuid' => 'required',
            'video_url'  => 'required',
        ]);
    }
}
