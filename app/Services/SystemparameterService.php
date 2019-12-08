<?php

namespace App\Http\Controllers;

use App\Systemparameter;

class SystemparameterService
{
    public function getParameter(string $type): int
    {
        return Systemparameter::where('type', $type)->value('value');
    }

    public function newParameter(string $type, int $value)
    {
        Systemparameter::create([
            'type' => $type,
            'value' => $value,
        ]);
    }
}
