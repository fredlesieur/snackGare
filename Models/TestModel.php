<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class TestModel extends BaseRepository
{
    public function __construct($pdo)
    {
        $this->db = $pdo;
        $this->table = 'test_table'; // Nom de table spécifié pour les tests
    }
}
