<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WordController extends Controller
{
    public function getRequests()
    {
        $requests = Word::doesntHave('translations')->has('requests')->withCount('requests')->orderBy('requests_count', 'desc')->orderBy('word')->paginate(25);
        dd($requests);

        return View::make('requests')->with('requests', $requests);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'literal'  => 'required|string',
        ]);

        $word = Word::firstOrCreate( [
            'literal' => $request->input('literal') ,
        ],[
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);

        return $word;
    }
}
