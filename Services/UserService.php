<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function authenticateUser(string $username, string $password): array
    {
        $user = $this->userRepository->findUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return ['success' => true, 'user' => $user];
        }

        return ['success' => false, 'message' => "Nom d'utilisateur ou mot de passe incorrect."];
    }

    public function registerUser(array $data): array
    {
        if (empty($data['username']) || empty($data['password']) || empty($data['role'])) {
            return ['success' => false, 'message' => "Tous les champs sont requis."];
        }

        if ($this->userRepository->findUserByUsername($data['username'])) {
            return ['success' => false, 'message' => "Un utilisateur avec ce nom existe déjà."];
        }

        $this->userRepository->createUser($data['username'], $data['password'], $data['role']);
        return ['success' => true, 'message' => "Utilisateur créé avec succès."];
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAll();
    }

    public function getUserById(int $id): ?array
    {
        return $this->userRepository->find($id);
    }

    public function updateUser(int $id, array $data): array
    {
        if (empty($data['username']) || empty($data['role'])) {
            return ['success' => false, 'message' => "Tous les champs sont requis."];
        }

        if ($this->userRepository->updateUser($id, $data)) {
            return ['success' => true, 'message' => "Utilisateur mis à jour avec succès."];
        }

        return ['success' => false, 'message' => "Une erreur s'est produite lors de la mise à jour."];
    }

    public function deleteUser(int $id): array
{
    // Vérifiez que l'utilisateur existe avant de tenter la suppression
    $user = $this->userRepository->find($id);
    if (!$user) {
        return ['success' => false, 'message' => "Utilisateur introuvable."];
    }

    // Tentative de suppression
    if ($this->userRepository->deleteUser($id)) {
        return ['success' => true, 'message' => "Utilisateur supprimé avec succès."];
    }

    return ['success' => false, 'message' => "Une erreur s'est produite lors de la suppression."];
}

}
