<?php

namespace App\Services;

use App\Repositories\KebabRepository;

class KebabService
{
    private $kebabRepository;

    public function __construct()
    {
        $this->kebabRepository = new KebabRepository();
    }

    /**
     * Récupérer tous les kebabs
     * @return array
     */
    public function getAllKebabs(): array
    {
        return $this->kebabRepository->findAllKebabs(); // Récupère tous les kebabs depuis le repository
    }
}
