<?php

namespace App\Services;

use App\Repositories\SnackRepository;

class SnackService
{
    private $snackRepository;

    public function __construct()
    {
        $this->snackRepository = new SnackRepository();
    }

    /**
     * Récupérer tous les snacks
     * @return array
     */
    public function getAllSnacks(): array
    {
        return $this->snackRepository->findAllSnacks();
    }

    /**
     * Récupérer un snack par son ID
     * @param int $id
     * @return array|null
     */
    public function getSnackById(int $id): ?array
    {
        return $this->snackRepository->findSnackById($id);
    }
}
