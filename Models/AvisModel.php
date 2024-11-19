<?php

namespace App\Models;

class AvisModel extends Model
{
    protected $table = 'avis';

    public function getApprovedAvis()
    {
        return $this->findBy(['statut' => 1]);
    }
}
