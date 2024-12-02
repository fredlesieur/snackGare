<?php

namespace App\Services;

use App\Repositories\OptionRepository;

class OptionService
{
    private $optionRepository;

    public function __construct()
    {
        $this->optionRepository = new OptionRepository();
    }

    /**
     * Récupérer toutes les options disponibles
     * @return array
     */
    public function getAllOptions(): array
    {
        return $this->optionRepository->findAll(); // Récupère toutes les options sans filtrage
    }

    public function getOptionById(int $id): ?array
    {
        return $this->optionRepository->findOptionById($id); // Récupère l'option avec l'ID spécifié
    }
}
