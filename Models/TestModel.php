<?php

namespace App\Models;

use App\Models\Model;

class TestModel extends Model
{
    public function __construct($pdo)
    {
        $this->db = $pdo;
        $this->table = 'test_table'; // Nom de table spécifié pour les tests
    }
}
