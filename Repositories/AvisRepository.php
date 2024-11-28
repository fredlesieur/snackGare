<?php

namespace App\Repositories;

class AvisRepository extends BaseRepository
{
    protected $table = 'avis';

    /**
     * Récupère tous les avis non validés.
     * @return array Liste des avis avec statut = 0.
     */
    public function getPendingReviews(): array
    {
        return $this->findBy(['statut' => 0]);
    }

    /**
     * Récupère tous les avis validés.
     * @return array Liste des avis avec statut = 1.
     */
    public function getApprovedReviews(): array
    {
        return $this->findBy(['statut' => 1]);
    }
  
    
    public function addReview(array $data): bool
{
    $sql = "INSERT INTO {$this->table} (nom, commentaire, dateavis, statut)
            VALUES (:nom, :commentaire, :dateavis, :statut)";
    
    // Log de la requête et des données
    error_log("Requête SQL : $sql");
    error_log("Données SQL : " . print_r($data, true));

    $query = $this->req($sql, $data);

    // Log du résultat de la requête
    if ($query) {
        error_log("Insertion réussie.");
    } else {
        error_log("Erreur lors de l'insertion : " . print_r($this->db->errorInfo(), true));
    }

    return $query && $query->rowCount() > 0;
}
}
