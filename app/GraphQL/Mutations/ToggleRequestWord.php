<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\GraphQL\RequestEndpoints;

class ToggleRequestWord
{
    private $endpoints;

    /**
     * RequestedWords constructor.
     *
     * @param RequestEndpoints $requestEndpoints
     */
    public function __construct(RequestEndpoints $requestEndpoints)
    {
        $this->endpoints = $requestEndpoints;
    }

    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue  Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args  The arguments that were passed into the field.
     * @param GraphQLContext $context  Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo  Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $this->endpoints->toggleRequestWord($rootValue, $args, $context, $resolveInfo);
    }
}
