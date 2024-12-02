<?php

namespace App\Services;

use App\Repositories\BurgerRepository;

class BurgerService
{
    private $burgerRepository;

    public function __construct()
    {
        $this->burgerRepository = new BurgerRepository();
    }

    /**
     * Récupère tous les burgers
     * @return array
     */
    public function getAllBurgers(): array
    {
        return $this->burgerRepository->findAllBurgers();
    }

    /**
     * Récupère un burger par son ID
     * @param int $id
     * @return array|null
     */
    public function getBurgerById(int $id): ?array
    {
        return $this->burgerRepository->findBurgerById($id);
    }

    /**
     * Crée un burger
     * @param array $data
     * @return bool
     */
    public function createBurger(array $data): bool
    {
        return $this->burgerRepository->createBurger($data);
    }

    /**
     * Met à jour un burger
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateBurger(int $id, array $data): bool
    {
        return $this->burgerRepository->updateBurger($id, $data);
    }

    /**
     * Supprime un burger
     * @param int $id
     * @return bool
     */
    public function deleteBurger(int $id): bool
    {
        return $this->burgerRepository->deleteBurger($id);
    }
}
