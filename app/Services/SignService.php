<?php

namespace App\Http\Controllers;

use App\Sign;
use App\Translation;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class SignService
{
    /**
     * @var LanguageService
     */
    private $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function makeSign(Request $request, $user): Sign
    {
        $sign = $this->newSign($request, $user);

        return $sign;
    }

    public function editSign(Request $request, Translation $translation, ?Authenticatable $user): Sign
    {
        if ($request->input('video_uuid') == null) {
            return null;
        }

        $sign = $this->newSign($request, $user);

        return $sign;
    }

    /**
     * @param Request $request
     * @param $user
     * @return Sign|\Illuminate\Database\Eloquent\Model
     */
    private function newSign(Request $request, $user): Sign
    {
        $this->validate($request, [
            'video_uuid' => 'required',
            'video_url' => 'required',
        ]);

        $sign = Sign::make([
            'video_uuid' => $request->input('video_uuid'),
            'video_url' => $request->input('video_url'),
            'thumbnail_url' => $request->input('thumbnail_url'),
            'small_thumbnail_url' => $request->input('small_thumbnail_url'),
            'language_id' => $this->languageService->getSigned()->id,
            'creator_id' => $user->id,
        ]);

        return $sign;
    }
}
