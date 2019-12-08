<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

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
     * @return array
     * @throws Exception
     */
    public function toggleRequest(Request $request)
    {
        $this->wordService->validateWord($request);

        $user = Auth::user();
        $word = $this->wordService->findOrMakeWord($request, $user);
        $word->save();

        $returnInfo = $word->requesters()->toggle($user);

        if ($word->requesters->isEmpty() && $word->translations->isEmpty()) {
            try {
                $word->delete();
            } catch (Exception $e) {
                return response($e, 500);
            }
        }

        return $returnInfo;
    }
}
