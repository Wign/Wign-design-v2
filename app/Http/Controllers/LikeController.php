<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use App\Services\UserService;
use \Illuminate\Foundation\Auth\User;
use App\Word;

class LikeController extends Controller
{
    private $userService;
    private $signRepository;
    private $wordRepositoty;

    /**
     * LikeController constructor.
     *
     * @param  UserService  $userService
     * @param  SignRepository  $signRepository
     * @param  WordRepository  $wordRepositoty
     */
    public function __construct(
        UserService $userService,
        SignRepository $signRepository,
        WordRepository $wordRepositoty
    ) {
        $this->userService = $userService;
        $this->signRepository = $signRepository;
        $this->wordRepositoty = $wordRepositoty;
    }

    public function toggleLike(String $signId, User $user): Sign
    {
        $sign = $this->signRepository->find($signId);

        if ($user != null) {
            $user->likes()->toggle($sign);
        }

        return $sign;
    }

    public function toggleRequest(String $wordId, User $user): Word
    {
        $word = $this->wordRepositoty->find($wordId);

        if (isset($user) && isset($word)) {
            $user->requests()->toggle($word);
        }

        return $word;
    }
}
