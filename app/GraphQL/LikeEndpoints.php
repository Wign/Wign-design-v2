<?php

use App\Http\Controllers\LikeController;

class LikeEndpoints {

    /**
     * @var \App\Http\Controllers\TranslationController
     */
    private $controller;

    public function __construct(LikeController $controller) {
        $this->controller = $controller;
    }

// QUERIES


// MUTATIONS
    public function toogleLike($rootValue, array $args, \Nuwave\Lighthouse\Support\Contracts\GraphQLContext $context, \GraphQL\Type\Definition\ResolveInfo $resolveInfo) {
        return $this->controller->toggleLike($context->request());
    }

}
