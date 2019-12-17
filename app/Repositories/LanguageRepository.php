<?php

namespace App\Http\Controllers;

use App\Language;

class LanguageRepository
{
    public function getWritten(): Language
    {
        $language = Language::findOrFail([
                'code' => 'da_DK',
                'type' => 'TEXT',
            ]
        );

        return $language;
    }

    public function getSigned(): Language
    {
        $language = Language::findOrFail([
                'code' => 'dt_DK',
                'type' => 'SIGN',
            ]
        );

        return $language;
    }
}
