<?php

namespace App\Repositories;

use App\Models\Model;
use App\Models\UserModel;

class UserRepository extends UserModel
{
    protected $table = 'utilisateurs';

    public function findUserByUsername(string $username): array | false
    {
        return $this->findBy(['username' => $username])[0] ?? false;
    }
    public function findUserById(int $id): array | false
{
    $result = $this->find($id);
    return $result;
}


    public function createUser(string $username, string $password, string $role): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        $result = $this->req(
            'INSERT INTO utilisateurs (username, password, role) VALUES (?, ?, ?)',
            [$username, $hashedPassword, $role]
        );
    
        return $result !== false;
    }
     

    public function updateUser(int $id, array $data): bool
{
    error_log("Données passées à hydrate dans updateUser : " . print_r($data, true));
    
    $this->hydrate($data);
    return $this->update($id);
}


    public function deleteUser(int $id): bool
    {
        return $this->delete($id);
    }

    public function findAllUsers(): array
    {
        return $this->findAll();
    }
}

