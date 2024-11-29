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
        return $this->findAll();
    }

    /**
     * Récupère un kebab par son ID
     * @param int $id
     * @return array|null
     */
    public function findKebabById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute un nouveau kebab
     * @param array $data
     * @return bool
     */
    public function createKebab(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour un kebab existant
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateKebab(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime un kebab
     * @param int $id
     * @return bool
     */
    public function deleteKebab(int $id): bool
    {
        return $this->delete($id);
    }
}
