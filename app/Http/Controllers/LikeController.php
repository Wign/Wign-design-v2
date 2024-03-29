<?php

namespace App\Http\Controllers;

use App\Repositories\SignRepository;
use App\Services\UserService;
use Log;

class LikeController extends Controller
{
    private $userService;
    private $signRepository;

    public function __construct(UserService $userService, SignRepository $signRepository)
    {
        $this->userService = $userService;
        $this->signRepository = $signRepository;
    }

    public function toggleLike(string $signId, $user)
    {
        $sign = $this->signRepository->find($signId);

        if ($user != null) {
            $user->likes()->toggle($sign);
        } else {
            Log::warning('Like not toggled because $user is null');
        }

        return $sign;
    }
}
