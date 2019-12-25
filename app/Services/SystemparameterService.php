<?php

namespace App\Services;

use App\Repositories\SystemparameterRepository;
use App\Systemparameter;

class SystemparameterService
{
    private $repository;

    public function __construct(SystemparameterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $key
     * @param string|null $type
     * @return int|string|null
     */
    public function getParameter(string $key, string $type = null)
    {
        $value = $this->repository->findParameterByKey($key)->value('value');

        switch ($type) {
            case 'STRING':
                return (string) $value;
            case 'INTEGER':
                return (int) $value;
            default:
                return;
        }
    }

    /**
     * @param string $key
     * @param string $type
     * @param $value
     * @return Systemparameter
     */
    public function newParameter(string $key, string $type, $value)
    {
        return $this->repository->create($key, $type, $value);
    }

    /**
     * @param string $key
     * @param string $type
     * @param $value
     */
    public function updateParameter(string $key, string $type, $value)
    {
        $parameter = $this->repository->findParameterByKey($key);

        $this->repository->update($parameter, $type, $value);
    }
}
