<?php

namespace App\Services;

use App\Repositories\TacosRepository;

class TacosService
{
    private $tacosRepository;

    public function __construct()
    {
        $this->tacosRepository = new TacosRepository();
    }

    /**
     * Récupère toutes les formules de tacos
     * @return array
     */
    public function getAllTacos(): array
    {
        return $this->tacosRepository->findAllTacos();
    }
}
