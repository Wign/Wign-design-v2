<?php

namespace App\GraphQL;

use App\Http\Controllers\LikeController;
use App\Http\Controllers\TranslationController;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LikeEndpoints
{
    /**
     * @var TranslationController
     */
    private $controller;

    public function __construct(LikeController $controller)
    {
        $this->controller = $controller;
    }

    // QUERIES

    // MUTATIONS
    public function toggleLike($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $signId = $args['signId'];

        return $this->controller->toggleLike($signId, $context->user());
    }
}
