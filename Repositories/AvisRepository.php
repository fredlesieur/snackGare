<?php

namespace App\Repositories;

class AvisRepository extends BaseRepository
{
    protected $table = 'avis';

    public function getApprovedAvis(): array
    {
        return $this->findBy(['statut' => 1]);
    }
}

