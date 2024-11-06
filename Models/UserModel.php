<?php

namespace App\Models;

use App\Models\Model;

class UserModel extends Model
{
    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function createUser($username, $password, $role)
    {
        $hashedPassword = $this->hashPassword($password);
        $query = "INSERT INTO utilisateurs (username, password, role) VALUES (:username, :password, :role)";
        return $this->req($query, ['username' => $username, 'password' => $hashedPassword, 'role' => $role]);
    }

    public function findUserByUsername($username)
    {
        $sql = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $this->req($sql, [$username]);
        return $stmt->fetch();
    }
}
