<?php

namespace App\Repositories;

class PageRepository extends BaseRepository
{
    protected $table = 'pages';

    public function findPageById(int $id): array | false
    {
        return $this->find($id);
    }
}

