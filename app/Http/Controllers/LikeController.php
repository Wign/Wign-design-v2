<?php

namespace App\Http\Controllers;

use App\Sign;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LikeController extends Controller
{
    private $userService;
    private $signRepository;

    public function __construct(UserService $userService, SignRepository $signRepository)
    {
        $this->userService = $userService;
        $this->signRepository = $signRepository;
    }

    public function toggleLike(GraphQLContext $context)
    {
        $user = $this->userService->getUser();
        $sign = $this->signRepository->find($context->request()->input('signId'));

        if ($user != null) {
            $user->likes()->toggle($sign);
        }

        return $sign;
    }
}
