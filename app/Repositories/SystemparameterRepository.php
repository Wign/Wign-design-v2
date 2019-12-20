<?php

namespace App\Repositories;

use App\Systemparameter;

class SystemparameterRepository
{
    public function findParameterByKey(string $key): Systemparameter
    {
        return Systemparameter::where('key', $key);
    }

    public function create(string $key, string $type, $value): Systemparameter
    {
        return Systemparameter::create([
            'key' => $key,
            'type' => $type,
            'value' => $value,
        ]);
    }

    public function update(Systemparameter $parameter, string $type, string $value)
    {
        if ($type != null) {
            $parameter->update(['type' => $type]);
        }
        $parameter->update(['value' => $value]);
    }
}
