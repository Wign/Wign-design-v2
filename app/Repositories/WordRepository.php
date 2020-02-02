<?php

namespace App\Repositories;

use App\Language;
use App\Word;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class WordRepository
{
    public function all(): Collection
    {
        return Word::all();
    }

    /**
     * Get all request to words that have no translations.
     *
     * @return Word|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function allActiveRequests()
    {
        return Word::doesntHave('translations')->has('requesters')->withCount('requesters');
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

    public function find($id)
    {
        return Word::find($id);
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

    public function getWordWithRequesters(Word $word)
    {
        return Word::withCount('requesters')->find($word->id);
    }

    public function getWordWithTranslation(string $literal, Language $language)
    {
        return Word::has('signs')->whereLanguageId($language->id)->whereLiteral($literal)->first();
    }
}
