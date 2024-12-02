<?php

namespace App\Repositories;

class UserRepository extends BaseRepository
{
    protected $table = 'utilisateurs';

    public function findUserByUsername(string $username): array | false
    {
        return $this->findBy(['username' => $username])[0] ?? false;
    }

    public function createUser(string $username, string $password, string $role): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $this->create([
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role,
        ]);
    }

    public function updateUser(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->delete($id);
    }

}
