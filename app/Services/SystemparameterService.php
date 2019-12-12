<?php

namespace App\Http\Controllers;

use App\Systemparameter;

class SystemparameterService
{
    public function getParameter(string $type, string $key)
    {
        $value = Systemparameter::where('key', $key)->value('value');

        switch ($type) {
            case 'STRING':
                return (string) $value;
            case 'INTEGER':
                return (int) $value;
            default:
                return $value;
        }
    }

    public function newParameter(string $key, string $type, $value)
    {
        Systemparameter::create([
            'key' => $key,
            'type' => $type,
            'value' => $value,
        ]);
    }

    public function updateParameter(string $key, string $type, $value)
    {
        $parameter = Systemparameter::find($key);

        if ($type != null) {
            $parameter->update(['type' => $type]);
        }
        $parameter->update(['value' => $value]);
    }

}
