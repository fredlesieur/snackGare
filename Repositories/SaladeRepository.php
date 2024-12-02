<?php

namespace App\Repositories;

class SaladeRepository extends BaseRepository
{
    protected $table = 'salades';

    /**
     * Récupère toutes les salades
     * @return array
     */
    public function findAllSalades(): array
    {
        return $this->findAll();
    }

    /**
     * Récupère une salade par son ID
     * @param int $id
     * @return array|null
     */
    public function findSaladeById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute une nouvelle salade
     * @param array $data
     * @return bool
     */
    public function createSalade(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour une salade existante
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateSalade(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime une salade
     * @param int $id
     * @return bool
     */
    public function deleteSalade(int $id): bool
    {
        return $this->delete($id);
    }
}
