<?php

namespace App\Repositories;

class BurgerRepository extends BaseRepository
{
    protected $table = 'burgers'; // Nom de la table dans la base de données

    /**
     * Récupère tous les burgers sous forme de tableaux associatifs
     * @return array
     */
    public function findAllBurgers(): array
    {
        return $this->findAll(); // Appelle la méthode générique du BaseRepository
    }

    /**
     * Récupère un burger par son ID sous forme de tableau associatif
     * @param int $id
     * @return array|null
     */
    public function findBurgerById(int $id): ?array
    {
        return $this->find($id) ?: null; // Appelle la méthode générique du BaseRepository
    }

    /**
     * Crée un nouveau burger dans la base de données
     * @param array $data
     * @return bool
     */
    public function createBurger(array $data): bool
    {
        return $this->create($data); // Appelle la méthode générique du BaseRepository
    }

    /**
     * Met à jour un burger existant dans la base de données
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateBurger(int $id, array $data): bool
    {
        return $this->update($id, $data); // Appelle la méthode générique du BaseRepository
    }

    /**
     * Supprime un burger par son ID
     * @param int $id
     * @return bool
     */
    public function deleteBurger(int $id): bool
    {
        return $this->delete($id); // Appelle la méthode générique du BaseRepository
    }
}
