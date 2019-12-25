<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortInput;
use App\Repositories\WordRepository;
use App\Services\WordService;
use App\Word;
use Exception;

class RequestController extends Controller
{
    private $wordService;
    private $wordRepository;

    /**
     * RequestController constructor.
     *
     * @param  WordService  $wordService
     * @param  WordRepository  $wordRepository
     */
    public function __construct(WordService $wordService, WordRepository $wordRepository)
    {
        $this->wordService = $wordService;
        $this->wordRepository = $wordRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.request');
    }

    public function list(int $limit, ?SortInput $sort)
    {
        $requests = $this->wordRepository->allActiveRequests();

        if (isset($limit) && $limit > 0) {
            $requests->limit($limit);
        }

        if ($sort) {
            $requests->sortInput($sort);
        } else {
            $requests->orderBy('requesters_count', 'desc')->orderBy('literal');
        }

        return $requests->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $wordId  - The id of the Word
     * @param $user  - The user whom toggled the request
     *
     * @return Word
     */
    public function toggleRequest($wordId, $user): Word
    {
        //$this->wordService->validateWord($context->request()); // TODO Hvorfor dobbelt? Denne kaldes også i findOrMakeWord...

        //$word = $this->wordService->findOrMakeWord($context->request(), $user); // TODO dette markerer brugeren som editor af word. Er det meningen? Brugeren efterspørger blot ordet... Nu er brugeren også editoren
        //$word->save(); // TODO Hvorfor sker dette ikke i servicen?

        /** @var Word $word */
        $word = $this->wordRepository->find($wordId);

        if (isset($user) && isset($word)) {
            $word->requesters()->toggle($user);
        }

        if ($this->wordService->isVacant($word)) {
            try {
                $this->wordRepository->delete($word);
            } catch (Exception $e) {
                // TODO Suggesting to log something here. In case it fails. It actual is hard to fail here, so it's nice to have some log to look at....
                // BTW, aner ikke hvorfor jeg skrev engelsk her...
            }
        }

        return $word;
    }
}
