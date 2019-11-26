<?php


namespace App\Http\Controllers;


use App\Language;

class LanguageService {

    public function getWritten() {
        $language = Language::findOrFail([
                'code' => 'da_DK',
                'type' => 'TEXT',
            ]
        );

        return $language;
    }

    public function getSigned() {
        $language = Language::findOrFail([
                'code' => 'dt_DK',
                'type' => 'SIGN',
            ]
        );

        return $language;
    }

}
