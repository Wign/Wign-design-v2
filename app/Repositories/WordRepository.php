<?php

namespace App\Repositories;

use App\Language;
use App\Word;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WordRepository
{
    public function all()
    {
        return Word::all();
    }

    /**
     * Get all requested words.
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function allRequested(): Word
    {
        return Word::has('requesters')->get();
    }

    /**
     * Get all words with at least one sign.
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function allSigned(): Word
    {
        return Word::has('signs')->get();
    }

    public function allVacant(): Word
    {
        return Word::doesntHave('signs')->doesntHave('requesters')->get();
    }

    public function find($id): Word
    {
        return Word::find($id);
    }

    public function update(array $data, Word $word)
    {
        $word->update($data);
    }

    public function delete(Word $word)
    {
        try {
            $word->delete();
        } catch (\Exception $e) {
            return \response($e, 500);
        }
        return \response("", 200);
    }

    public function make(Request $request, Language $language, $user): Word {
        return Word::make([
            'literal' => $request->input('literal'),
            'language_id' => $language->id,
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }

    public function findByLiteral(Request $request, Language $language): Word {
        return Word::where([
            'literal' => $request->input('literal'),
            'language_id' => $language->id,
        ])->first();
    }

    public function firstOrNew(Request $request, Language $language, $user): Word {
        return Word::firstOrNew([
            'literal' => $request->input('literal'),
            'language_id' => $language->id,
        ], [
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }
}
