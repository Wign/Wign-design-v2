<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use Illuminate\Http\Request;

class WordController extends Controller
{
    protected $wordRepository;

    /**
     * WordController constructor.
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
