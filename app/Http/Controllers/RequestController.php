<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use App\Word;
use Auth;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestController extends Controller
{
    private $wordService;
    private $wordRepository;
    private $userService;

    /**
     * RequestController constructor.
     * @param WordService $wordService
     * @param WordRepository $wordRepository
     * @param UserService $userService
     */
    public function __construct(WordService $wordService, WordRepository $wordRepository, UserService $userService)
    {
        $this->wordService = $wordService;
        $this->wordRepository = $wordRepository;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $requests = $this->wordRepository->allActiveRequests();

        return view('requests')->with($requests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return Word
     */
    public function toggleRequest($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): Word
    {
        $this->wordService->validateWord($context->request());

        $user = $this->userService->getUser();
        $word = $this->wordService->findOrMakeWord($context->request(), $user);
        $word->save();

        $word->requesters()->toggle($user);

        if ($this->wordService->isVacant($word)) {
            try {
                $this->wordRepository->delete($word);
            } catch (Exception $e) { }
        }

        return $word;
    }
}
