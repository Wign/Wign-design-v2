<?php

namespace App\GraphQL;

use App\Http\Controllers\LikeController;
use App\Word;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Log;
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

    public function toggleRequest($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): Word
    {
        Log::debug('context user');
        Log::debug($context);
        return $this->controller->toggleRequest($args['wordId'], $context->user());
    }
}
