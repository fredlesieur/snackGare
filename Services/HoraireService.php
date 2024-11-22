<?php

namespace App\Services;

use App\Repositories\HoraireRepository;

class HoraireService
{
    private $horaireRepository;

    public function __construct()
    {
        $this->horaireRepository = new HoraireRepository();
    }

    public function getHoraireById(int $id): array
    {
        return $this->horaireRepository->find($id);
    }

    public function updateHoraire(int $id, array $data): bool
    {
        return $this->horaireRepository->update($id, $data);
    }

    public function validateHoraire(array $data): array
    {
        $errors = [];
        if (empty($data['jours'])) {
            $errors[] = "Le champ 'Jour' est obligatoire.";
        }
        // Ajouter d'autres validations si nécessaire
        return $errors;
    }
}
