<?php

namespace App\Services;

use App\Repositories\SaladeRepository;

class SaladeService
{
    private $saladeRepository;

    public function __construct()
    {
        $this->saladeRepository = new SaladeRepository();
    }

    /**
     * Récupérer toutes les salades
     * @return array
     */
    public function getAllSalades(): array
    {
        return $this->saladeRepository->findAllSalades();
    }

    /**
     * Récupérer une salade par son ID
     * @param int $id
     * @return array|null
     */
    public function getSaladeById(int $id): ?array
    {
        return $this->saladeRepository->findSaladeById($id);
    }
}
