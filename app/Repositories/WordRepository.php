<?php

namespace App\Repositories;

use App\Language;
use App\Word;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use function response;

class WordRepository
{
    public function all(): Collection
    {
        return Word::all();
    }

    /**
     * Get all requested words.
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function allRequested(): Collection
    {
        return Word::has('requesters')->get();
    }

    /**
     * Get all words with at least one sign.
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function allSigned(): Collection
    {
        return Word::has('signs')->get();
    }

    public function allVacant(): Collection
    {
        return Word::doesntHave('signs')->doesntHave('requesters')->get();
    }

    public function update(array $data, Word $word)
    {
        $word->update($data);
    }

    public function delete(Word $word)
    {
        try {
            $word->delete();
        } catch (Exception $e) {
            return response($e, 500);
        }

        return response('', 200);
    }

    public function make(string $literal, Language $language, $user): Word
    {
        return Word::make([
            'literal' => $literal,
            'language_id' => $language->id,
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }

    public function findByLiteral(string $literal, Language $language)
    {
        return Word::where([
            'literal' => $literal,
            'language_id' => $language->id,
        ])->first();
    }

    public function firstOrNew(string $literal, Language $language, $user): Word
    {
        return Word::firstOrNew([
            'literal' => $literal,
            'language_id' => $language->id,
        ], [
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);
    }
}
