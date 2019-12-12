<?php

namespace App\Http\Controllers;

use App\Translation;
use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WordService
{
    /**
     * @var LanguageService
     */
    private $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function findOrMakeWord(Request $request, $user): Word
    {
        $this->validateWord($request);

        $word = $this->findWord($request->input('literal'));

        if ($word == null) {
            $word = Word::make([
                'literal' => $request->input('literal'),
                'language_id' => $this->languageService->getWritten()->id,
                'creator_id' => $user->id,
                'editor_id' => $user->id,
            ]);
        } else {
            $word->editor->save($user);
        }

        return $word;
    }

    public function findWord($literal): Word
    {
        $word = Word::withTrashed()->where([
            'literal' => $literal,
            'language_id' => $this->languageService->getWritten()->id,
        ])->first();

        return $word;
    }

    public function editWord(Request $request, Translation $translation, Auth $user): Word
    {
        if ($this->isUnchanged($request, $translation->word)) {
            return null;
        }

        $word = Word::firstOrNew([
            'literal' => $request->input('literal'),
            'language_id' => $this->languageService->getWritten()->id,
        ], [
            'creator_id' => $user->id,
            'editor_id' => $user->id,
        ]);

        return $word;
    }

    public function renameLiteral(Request $request, Translation $translation, Auth $user): Word
    {
        if ($this->isUnchanged($request, $translation->word)) {
            return null;
        }

        $word = Word::where([
            'literal' => $request->input('literal'),
            'language_id' => $this->languageService->getWritten()->id,
        ])->first();

        if ($word == null) {
            $translation->word->literal = $request->input('literal');
            $translation->word->editor->save($user);
        } else {
            $translation->word->requesters()->save($word);
            $translation->word->translations()->save($word);
            try {
                $translation->word->delete();
            } catch (\Exception $e) {
            }
        }

        return $translation->word;
    }

    public function isVacant(Word $word) {
        return $word->requesters->isEmpty() && $word->translations->isEmpty();
    }

    public function validateWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'literal' => 'required|alpha_num',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        return true;
    }

    /**
     * @param Request $request
     * @param Word $word
     * @return bool
     */
    private function isUnchanged(Request $request, Word $word): bool
    {
        return $request->input('literal') == $word->literal;
    }
}
