<?php /** @noinspection PhpUnused - The methods here is used by Lighthouse's own resolver */

namespace App\GraphQL;

use App\Http\Controllers\RequestController;
use App\Http\Requests\SortInput;
use App\Word;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestEndpoints
{
    /**
     * @var RequestController
     */
    private $requestController;

    public function __construct(RequestController $requestController)
    {
        $this->requestController = $requestController;
    }

    // QUERIES
    public function requestedWords($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $limit = isset($args['first']) ? intval($args['first']) : 0;
        $sort  = isset($args['sort']) ? new SortInput($args['sort']) : null;

        return $this->requestController->list($limit, $sort);
    }

    // MUTATIONS
    public function toggleRequestWord($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        try {
            $wordId = $args['wordId'];
            $this->requestController->toggleRequest($wordId, $context->user());

            return Word::withCount('requesters')->find($wordId);

        } catch (Exception $e) {
            return response($e, 500);
        }
    }
}
