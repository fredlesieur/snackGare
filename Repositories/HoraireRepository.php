<?php

namespace App\Repositories;

class HoraireRepository extends BaseRepository
{
    protected $table = 'horaires';

    public function createHoraire(array $data): bool
    {
        return $this->create($data);
    }

    public function updateHoraire(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteHoraire(int $id): bool
    {
        return $this->delete($id);
    }

    public function findHoraireById(int $id): array | false
    {
        return $this->find($id);
    }

    public function findAllHoraires(): array
    {
        return $this->findAll();
    }
}
