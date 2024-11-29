<?php

namespace App\Repositories;

class SnackRepository extends BaseRepository
{
    protected $table = 'snacks';

    /**
     * Récupère tous les snacks
     * @return array
     */
    public function findAllSnacks(): array
    {
        return $this->findAll();
    }

    /**
     * Récupère un snack par son ID
     * @param int $id
     * @return array|null
     */
    public function findSnackById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute un nouveau snack
     * @param array $data
     * @return bool
     */
    public function createSnack(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour un snack existant
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateSnack(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime un snack
     * @param int $id
     * @return bool
     */
    public function deleteSnack(int $id): bool
    {
        return $this->delete($id);
    }
}
