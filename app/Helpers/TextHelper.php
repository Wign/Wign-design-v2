<?php

namespace App\Helpers;

use App\Repositories\LanguageRepository;
use App\Text;

class TextHelper {

    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function fetch(string $code, string ...$replacements) {
        $text = Text::where('code', $code)->first();

        if ($text == null) {
            return Text::create([
                'code' => $code,
                'text' => $code,
                'language_id' => $this->languageRepository->getWritten()->id,
            ]);

        } else if (empty($replacements)) {
            return $text;
        }

        $newText = '';
        $offset = 0;
        for ($i = 0; $i < strlen($text); $i++) {
            if (substr($text, $i, 1) === '{' && (substr($text, $i-1, 1) !== '\\' || $i == 0)) {
                $newText .= substr($text, $offset, $i + 1);
                $offset = $i + 3; //Set to the position after "{n}"

                $number = intval(substr($text, $i + 1, 1));
                $newText .= $replacements[$number];
                $i =+ 2;
            }
        }
        if ($offset < strlen($text)) {
            $newText .= substr($text, $offset, strlen($text) - $offset);
        }

        return $newText;
    }
}