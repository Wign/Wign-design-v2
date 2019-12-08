<?php

use App\Http\Controllers\RequestController;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestEndpoints
{
    /**
     * @var RequestController
     */
    private $controller;

    public function __construct(RequestController $controller)
    {
        $this->controller = $controller;
    }

    // QUERIES
    public function requestedWords($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $this->controller->index();
    }

    // MUTATIONS
    public function toggleRequestWord($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $this->controller->toggleRequest($context->request());
    }
}
