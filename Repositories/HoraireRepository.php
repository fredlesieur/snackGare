<?php

namespace App\Repositories;

class HoraireRepository extends BaseRepository
{
    protected $table = 'horaires';

    public function findByPageId(int $pageId): array
    {
        return $this->findBy(['page_id' => $pageId]);
    }
}
