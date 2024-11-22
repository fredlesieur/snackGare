<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class PageRepository extends BaseRepository
{
    protected $table = 'pages';

    public function findPageById(int $id): array | false
    {
        return $this->find($id);
    }
}

