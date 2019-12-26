<?php

namespace App\GraphQL;

use App\Http\Controllers\LikeController;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LikeEndpoints
{
    /**
     * @var \App\Http\Controllers\TranslationController
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
        return $this->controller->toggleLike($args['signId'], $context->user());
    }
}
