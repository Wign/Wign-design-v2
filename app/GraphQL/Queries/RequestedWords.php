<?php

namespace App\GraphQL\Queries;

use App\Repositories\WordRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestedWords
{
    protected $wordRepository;

    /**
     * RequestedWords constructor.
     *
     * @param $wordRepository
     */
    public function __construct(WordRepository $wordRepository)
    {
        $this->wordRepository = $wordRepository;
    }

    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue  Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args  The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context  Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo  Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     *
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $requested = $this->wordRepository->allRequested();
        if (isset($args['first'])) {
            $requested->limit($args['first']);
        }
        $sort = $args['sort'];
        if(isset($sort)) {
            if(isset($sort['sortColumn'])) {
                $requested->orderBy($sort['sortColumn'], $sort['sortOrder'] ?? 'ASC');
            }
            if(isset($sort['whereColumn']) && isset($sort['whereValue'])) {
                $requested->where($sort['whereColumn'], $sort['whereOperator'] ?? '=', $sort['whereValue']);
            }
        }
        return $requested->withCount('requesters')->get();
    }
}
