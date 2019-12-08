<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RequestController extends Controller
{
    private $wordService;

    /**
     * RequestController constructor.
     * @param WordService $wordService
     */
    public function __construct(WordService $wordService)
    {
        $this->wordService = $wordService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Word::doesntHave('translations')->has('requesters')->withCount('requesters')->orderBy('requesters_count', 'desc')->orderBy('literal');

        return view('requests')->with($requests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function toggleRequest(Request $request)
    {
        try {
            $this->validate($request, [
                'literal' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back(404);
        }

        $user = \Auth::user();
        $word = $this->wordService->findOrMakeWord($request, $user);
        $word->save();

        $word->requesters()->toggle($user);

        if ($word->requesters->isEmpty() && $word->translations->isEmpty()) {
            try {
                $word->delete();
            } catch (\Exception $e) {
                return response($e, 500);
            }
        }

        return response()->view('requests');
    }
}
