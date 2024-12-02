<?php

namespace App\Repositories;

class KebabRepository extends BaseRepository
{
    protected $table = 'kebabs';

    /**
     * Récupère tous les kebabs
     * @return array
     */
    public function findAllKebabs(): array
    {
        return $this->findAll(); // Récupère tous les kebabs depuis la table 'kebabs'
    }

    /**
     * Récupère un kebab par son ID
     * @param int $id
     * @return array|null
     */
    public function findKebabById(int $id): ?array
    {
        return $this->find($id); // Récupère un kebab par son ID
    }

    /**
     * Ajoute un nouveau kebab
     * @param array $data
     * @return bool
     */
    public function createKebab(array $data): bool
    {
        return $this->create($data); // Crée un kebab dans la table
    }

    /**
     * Met à jour un kebab existant
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateKebab(int $id, array $data): bool
    {
        return $this->update($id, $data); // Met à jour un kebab
    }

    /**
     * Supprime un kebab
     * @param int $id
     * @return bool
     */
    public function deleteKebab(int $id): bool
    {
        return $this->delete($id); // Supprime un kebab
    }
}
