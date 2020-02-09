<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortInput;
use App\Http\Requests\WordRequest;
use App\Repositories\WordRepository;
use App\Services\WordService;
use App\Word;
use Auth;
use Exception;
use Log;

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

    /**
     * Returns a list of all active requested words.
     * Those can be limited to $limit requests, and/or sorted using SortInput $sort.
     * @param  int  $limit
     * @param  SortInput|null  $sort
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getList(int $limit, ?SortInput $sort)
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
     * @param  WordRequest  $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|void|null
     */
    public function toggleRequest(WordRequest $request)
    {
        $user = Auth::user();

        $word = $this->wordService->findOrMakeWord($request, $user);
        $word->save();

        if (isset($user) && isset($word)) {
            $word->requesters()->toggle($user);
        }

        if ($this->wordService->isVacant($word)) {
            try {
                $this->wordRepository->delete($word);
            } catch (Exception $e) {
                Log::error('Deleting the word has failed', [$e]);

                return abort(500, __('error.request.toggle.failed'));
            }

            return;
        }

        return $this->wordRepository->getWordWithRequesters($word);
    }
}
