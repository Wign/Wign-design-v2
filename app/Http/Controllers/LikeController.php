<?php

namespace App\Http\Controllers;

use App\Repositories\SignRepository;
use App\Services\UserService;
use App\Sign;
use Illuminate\Foundation\Auth\User;

class LikeController extends Controller
{
    private $userService;
    private $signRepository;

    /**
     * LikeController constructor.
     *
     * @param  UserService  $userService
     * @param  SignRepository  $signRepository
     */
    public function __construct(
        UserService $userService,
        SignRepository $signRepository
    ) {
        $this->userService = $userService;
        $this->signRepository = $signRepository;
    }

    public function toggleLike(String $signId, User $user): Sign
    {
        $sign = $this->signRepository->find($signId);

        if ($user != null) {
            $user->likes()->toggle($sign);
        }

        return $sign;
    }
}
