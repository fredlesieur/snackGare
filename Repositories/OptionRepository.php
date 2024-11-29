<?php

namespace App\Repositories;

class OptionRepository extends BaseRepository
{
    protected $table = 'options';

    /**
     * Récupère toutes les options d'une catégorie
     * @param string $category
     * @return array
     */
    public function findByCategory(string $category): array
    {
        return $this->findBy(['category' => $category]);
    }

    /**
     * Récupère une option par son ID
     * @param int $id
     * @return array|null
     */
    public function findOptionById(int $id): ?array
    {
        return $this->find($id) ?: null;
    }

    /**
     * Ajoute une nouvelle option
     * @param array $data
     * @return bool
     */
    public function createOption(array $data): bool
    {
        return $this->create($data);
    }

    /**
     * Met à jour une option existante
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateOption(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    /**
     * Supprime une option
     * @param int $id
     * @return bool
     */
    public function deleteOption(int $id): bool
    {
        return $this->delete($id);
    }
}
