<?php

namespace App\Http\Controllers;

use App\Repositories\WordRepository;
use App\Translation;
use App\Word;
use Illuminate\Http\Request;

class WordService
{
    private $languageService;
    private $wordRepository;

    public function __construct(LanguageRepository $languageRepository, WordRepository $wordRepository)
    {
        $this->languageService = $languageRepository;
        $this->wordRepository = $wordRepository;
    }

    public function findOrMakeWord(Request $request, $user): Word
    {
        $this->validateWord($request);

        $word = $this->findWord($request);

        if ($word == null) {
            $language = $this->languageService->getWritten();
            $word = $this->wordRepository->make($request->input('literal'), $language, $user);
        } else {
            $word->editor->save($user);
        }

        return $word;
    }

    public function findWord(Request $request): Word
    {
        $language = $this->languageService->getWritten();
        $word = $this->wordRepository->findByLiteral($request, $language);

        return $word;
    }

    public function editWordSoftly(Request $request, Translation $translation, $user): Word
    {
        if ($this->isChanged($request, $translation->word)) {
            $language = $this->languageService->getWritten();
            $word = $this->wordRepository->firstOrNew($request, $language, $user);

            return $word;
        }

        return null;
    }

    public function editWordHardly(Request $request, Translation $translation, $user): Word //TODO add in API
    {
        if ($this->isUnchanged($request, $translation->word)) {
            return null;
        }

        $language = $this->languageService->getWritten();
        $word = $this->wordRepository->findByLiteral($request, $language);

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

    private function validateWord(Request $request)
    {
        $this->validate($request, [
            'literal' => 'required|alpha_num', //TODO vær ikke vred mere
        ]);
    }

    /**
     * @param Request $request
     * @param Word $word
     * @return bool
     */
    private function isChanged(Request $request, Word $word): bool
    {
        return $request->input('literal') != $word->literal;
    }
}
