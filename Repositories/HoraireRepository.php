<?php

namespace App\Repositories;

class HoraireRepository extends BaseRepository
{
    protected $table = 'horaires';

    public function findByPageId(int $pageId): array
    {
        return $this->findBy(['page_id' => $pageId]);
    }

    public function findAllHoraires(): array
    {
        return $this->findAll();
    }
    public function update(int $id, array $data): bool
{
    $fields = array_keys($data);
    $placeholders = implode(', ', array_map(fn($field) => "$field = :$field", $fields));
    $sql = "UPDATE {$this->table} SET $placeholders WHERE id = :id";
    
    $data['id'] = $id;
    return $this->req($sql, $data);
}
}
