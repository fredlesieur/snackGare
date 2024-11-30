<?php

namespace App\Services;

use App\Repositories\BoissonRepository;

class BoissonService
{
    private $boissonRepository;

    public function __construct()
    {
        $this->boissonRepository = new BoissonRepository();
    }

    /**
     * Récupérer toutes les boissons
     * @return array
     */
    public function getAllBoissons(): array
    {
        return $this->boissonRepository->findAllBoissons();
    }

    /**
     * Récupérer une boisson par son ID
     * @param int $id
     * @return array|null
     */
    public function getBoissonById(int $id): ?array
    {
        return $this->boissonRepository->findBoissonById($id);
    }
}
