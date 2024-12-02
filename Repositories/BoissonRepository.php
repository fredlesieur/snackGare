<?php

namespace App\Repositories;

class BoissonRepository extends BaseRepository
{
    protected $table = 'boissons';

    /**
     * Récupère toutes les boissons
     * @return array
     */
    public function findAllBoissons(): array
    {
        return $this->findAll();
    }

    /**
     * Récupère une boisson par son ID
     * @param int $id
     * @return array|null
     */
    public function findBoissonById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute une nouvelle boisson
     * @param array $data
     * @return bool
     */
    public function createBoisson(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour une boisson existante
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateBoisson(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime une boisson
     * @param int $id
     * @return bool
     */
    public function deleteBoisson(int $id): bool
    {
        return $this->delete($id);
    }
}
