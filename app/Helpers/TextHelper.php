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

        for ($i = 0; $i < sizeof($replacements); $i++) {
            if (substr($text, $i, 1) === '{' && (substr($text, $i-1, 1) !== '\\' || $i == 0)) {
                $length = 1;

                while (substr($text, $i + $length, 1) !== '}' && $i + $length < strlen($text)) {
                    $length++;
                }
                if ($length <= 1 || !is_int(substr($text, $i + 1, $length - 1))) {
                    $i =+ $length;
                    continue;
                }
            }

        }
    }
}