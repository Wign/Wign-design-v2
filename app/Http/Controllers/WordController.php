<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;

class WordController extends Controller
{
    protected $wordRepository;

    /**
     * WordController constructor.
     *
     * @param  WordRepository  $wordRepository
     */
    public function __construct(WordRepository $wordRepository)
    {
        $this->wordRepository = $wordRepository;
    }

    public function index()
    {
        $words = $this->wordRepository->all();

        // En eksempel på returnering af view med alle ord
        //return view("something", compact("words"));

        // Eller returner alle ord som json object (API kald, selvom vi bruger graphQL nu)
        return $words;

        // Se resultatet i http://localhost/words
    }
}
