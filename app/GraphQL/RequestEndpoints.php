<?php

namespace App\GraphQL;

use App\Http\Controllers\RequestController;
use Exception;
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
        try {
            return $this->controller->toggleRequest($rootValue, $args, $context, $resolveInfo);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }
}
