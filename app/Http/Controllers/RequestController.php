<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestController extends Controller
{
    private $wordService;
    private $wordRepository;

    /**
     * RequestController constructor.
     * @param WordService $wordService
     * @param WordRepository $wordRepository
     */
    public function __construct(WordService $wordService, WordRepository $wordRepository)
    {
        $this->wordService = $wordService;
        $this->wordRepository = $wordRepository;
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
     * @param Request $request
     *
     * @return \App\Word
     * @throws Exception
     */
    public function toggleRequest(Request $request)
    {
        $this->wordService->validateWord($request);

        $user = Auth::user();
        $word = $this->wordService->findOrMakeWord($request, $user);
        $word->save();

        $word->requesters()->toggle($user);

        if ($this->wordService->isVacant($word)) {
            try {
                $word->delete();
            } catch (Exception $e) {
                return response($e, 500);
            }
        }

        return $word;
    }
}
