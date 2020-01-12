<?php

/** @noinspection PhpUnused - The methods here is used by Lighthouse's own resolver */

namespace App\GraphQL;

use App\Http\Controllers\RequestController;
use App\Http\Requests\SortInput;
use App\Http\Requests\WordRequest;
use App\Repositories\WordRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestEndpoints
{
    private $requestController;
    private $wordRepository;

    public function __construct(RequestController $requestController, WordRepository $wordRepository)
    {
        $this->requestController = $requestController;
        $this->wordRepository = $wordRepository;
    }

    // QUERIES
    public function requestedWords($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $limit = isset($args['first']) ? intval($args['first']) : 0;
        $sort = isset($args['sort']) ? new SortInput($args['sort']) : null;

        return $this->requestController->getList($limit, $sort);
    }

    // MUTATIONS
    public function toggleRequestWord($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $wordRequest = new WordRequest($args['literal']);
        try {
            $word = $this->requestController->toggleRequest($wordRequest, $context->user());

        return $this->requestController->toggleRequest($literal);
    }
}
