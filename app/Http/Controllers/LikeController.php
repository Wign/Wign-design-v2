<?php

namespace App\Http\Controllers;

use App\Sign;
use Illuminate\Http\Request;

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

    public function toggleLike(Request $request)
    {
        $user = $this->userService->getUser($request);
        $sign = Sign::find($request->input('signId'));
        if ($user != null) {
            $user->likes()->toggle($sign);
        }
        return $sign;
    }
}
