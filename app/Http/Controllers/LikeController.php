<?php

namespace App\Http\Controllers;

use App\Sign;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

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

    public function toggleLike($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = $this->userService->getUser($context);
        $sign = Sign::find($context->request()->input('signId'));

        if ($user != null) {
            $user->likes()->toggle($sign);
        }

        return $sign;
    }
}
