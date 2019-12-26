<?php

namespace App\Services;

use App\Repositories\LanguageRepository;
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
        $literal = $request->input('literal');

        $word = $this->findWord($literal);

        if ($word == null) {
            $language = $this->languageService->getWritten();
            $word = $this->wordRepository->make($literal, $language, $user);
        } else {
            $word->editor->save($user);
        }

        return $word;
    }

    public function findWord(string $literal)
    {
        $language = $this->languageService->getWritten();
        $word = $this->wordRepository->findByLiteral($literal, $language);

        return $word;
    }

    public function editWordSoftly(Request $request, Translation $translation, $user): Word
    {
        if ($this->isChanged($request->input('literal'), $translation->word)) {
            $language = $this->languageService->getWritten();
            $word = $this->wordRepository->firstOrNew($request, $language, $user);

            return $word;
        }

        return null;
    }

    public function editWordHardly(Request $request, Translation $translation, $user): Word //TODO add in API
    {
        if (!$this->isChanged($request, $translation->word)) {
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

    public function validateWord(Request $request)
    {
        return true; // TODO I must insert it here because it doesn't work. Validate method doesn't exist in WordService. Perhaps you meant $request->validate()?
        $this->validate($request, [
            'literal' => 'required|alpha_num', //TODO vær ikke vred mere
        ]);
    }

    /**
     * @param  string  $literal
     * @param  Word  $word
     *
     * @return bool
     */
    private function isChanged(string $literal, Word $word): bool
    {
        return $literal != $word->literal;
    }

    public function isVacant(Word $word): bool
    {
        return $word->translations()->doesntExist() && $word->requesters()->doesntExist();
    }
}
