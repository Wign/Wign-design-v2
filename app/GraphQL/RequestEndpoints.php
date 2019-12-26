<?php

/** @noinspection PhpUnused - The methods here is used by Lighthouse's own resolver */

namespace App\GraphQL;

use App\Http\Controllers\RequestController;
use App\Http\Requests\SortInput;
use App\Repositories\WordRepository;
use Exception;
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
        try {
            $wordId = $args['wordId'];
            $this->requestController->toggleRequest($wordId, $context->user());

            return $this->wordRepository->getWordWithRequesters($wordId);

        } catch (Exception $e) {
            return response($e, 500);
        }
    }
}
