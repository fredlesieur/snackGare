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
        $sql = "INSERT INTO {$this->table} (nom, commentaire, dateavis, statut, rating)
                VALUES (:nom, :commentaire, :dateavis, :statut, :rating)";
    
        $query = $this->req($sql, [
            'nom' => $data['nom'],
            'commentaire' => $data['commentaire'],
            'dateavis' => $data['dateavis'],
            'statut' => $data['statut'],
            'rating' => $data['rating'],
        ]);
    
        return $query && $query->rowCount() > 0;
    }
    
}
