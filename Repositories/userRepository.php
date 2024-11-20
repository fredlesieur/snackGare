<?php

namespace App\Repositories;

use App\Config\Db;

class UserRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function findUserByUsername(string $username): array | false
    {
        $sql = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function createUser(string $username, string $hashedPassword, string $role): bool
    {
        $sql = "INSERT INTO utilisateurs (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role,
        ]);
    }
}
