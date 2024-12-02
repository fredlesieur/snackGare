<?php

namespace App\Repositories;

class TacosRepository extends BaseRepository
{
    protected $table = 'tacos'; // Nom de la table associée

    /**
     * Récupère toutes les formules de tacos
     * @return array
     */
    public function findAllTacos(): array
    {
        return $this->findAll();
    }

    /**
     * Récupère une formule de tacos par son ID
     * @param int $id
     * @return array|null
     */
    public function findTacoById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute une nouvelle formule de tacos
     * @param array $data
     * @return bool
     */
    public function createTaco(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour une formule de tacos existante
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateTaco(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime une formule de tacos
     * @param int $id
     * @return bool
     */
    public function deleteTaco(int $id): bool
    {
        return $this->delete($id);
    }
}
