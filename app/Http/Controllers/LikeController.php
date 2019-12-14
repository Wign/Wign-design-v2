<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Sign;
use \Illuminate\Foundation\Auth\User;
use App\Word;

class LikeController extends Controller
{
    private $userService;

    /**
     * LikeController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function toggleLike(String $signId, User $user)
    {
        $sign = Sign::find($signId);

        if ($user != null) {
            $user->likes()->toggle($sign);
        }

        return $sign;
    }

    public function toggleRequest(String $wordId, User $user): Word {
        $word = Word::find($wordId);

        if (isset($user) && isset($word)) {
            $user->requests()->toggle($word);
        }

        return $word;
    }
}
