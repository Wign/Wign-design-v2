<?php

namespace App\Repositories;

use App\Word;
use Exception;

class WordRepository implements RespositoryInterface
{
    protected $word;

    public function __construct(Word $word)
    {
        $this->word = $word;
    }

    public function all()
    {
        return $this->word->all();
    }

    /**
     * Get all request to words that have no translations
     *
     * @return Word|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function allActiveRequests() {
        return $this->word->doesntHave('translations')->has('requesters')->withCount('requesters')->orderBy('requesters_count', 'desc')->orderBy('literal');
    }

    /**
     * Get all words with at least one sign.
     *
     * @return Word[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function allSigned()
    {
        return $this->word->has('signs')->get();
    }

    public function allVacant()
    {
        return $this->word->doesntHave('signs')->doesntHave('requesters')->get();
    }

    public function onlyTrashed()
    {
        return $this->word->onlyTrashed()->get();
    }

    public function find($id)
    {
        return $this->word->find($id);
    }

    public function create(array $data)
    {
        return $this->word->create($data);
    }

    public function update(array $data, $id)
    {
        $word = $this->find($id);
        $word->update($data);
    }

    public function delete($id)
    {
        try {
            Word::find($id)->delete();
        } catch (Exception $e) {
            return response($e, 500);
        }
    }
}
