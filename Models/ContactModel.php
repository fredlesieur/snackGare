<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class ContactModel extends BaseRepository
{
    protected $table = 'contact';

    /**
     * Insère une image dans la base de données.
     * 
     * @param string $imageUrl L'URL de l'image.
     * @return bool Retourne true si l'insertion a réussi.
     */
    public function createContact($imageUrl)
    {  var_dump($imageUrl);
        try {
            return $this->req(
                "INSERT INTO {$this->table} (image) VALUES (:image)",
                ['image' => $imageUrl]
            );
        } catch (\Exception $e) {
            // Affiche l'erreur SQL pour déboguer
            error_log("Erreur SQL : " . $e->getMessage());
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }
    

    public function findAll()
    {
        $sql = "SELECT * FROM contact";
        $stmt = $this->req($sql);
        return $stmt->fetchAll();
    }
}
