<?php

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestEndpoints {

    /**
     * @var \App\Http\Controllers\RequestController
     */
    private $controller;

    public function __construct(\App\Http\Controllers\RequestController $controller) {
        $this->controller = $controller;
    }

// QUERIES
    public function requestedWords($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        return $this->controller->index();
    }

// MUTATIONS
    public function requestWord($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
        return $this->controller->toggleRequest($context->request());
    }
}
