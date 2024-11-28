<?php

namespace App\Services;

use App\Repositories\AvisRepository;

class AvisService
{
    private $avisRepository;

    public function __construct()
    {
        $this->avisRepository = new AvisRepository();
    }

    /**
     * Ajoute un nouvel avis après validation des données.
     * @param array $data Données de l'avis.
     * @return bool Succès ou échec.
     * @throws \Exception Si une erreur survient.
     */
    public function addReview(array $data): bool
    {
        if (strlen($data['commentaire']) > 400) {
            throw new \Exception("Le commentaire doit contenir moins de 400 caractères.");
        }
    
        // Vérification de la validité de la note
        if (!isset($data['rating']) || $data['rating'] < 1 || $data['rating'] > 5) {
            throw new \Exception("La note doit être comprise entre 1 et 5.");
        }
    
        $data['statut'] = 0; // Non validé par défaut
        $data['dateavis'] = date('Y-m-d H:i:s');
    
        // Appel au repository
        return $this->avisRepository->addReview($data);
    }
    

    /**
     * Récupère tous les avis non validés.
     * @return array Liste des avis en attente de validation.
     */
    public function getPendingReviews(): array
    {
        return $this->avisRepository->getPendingReviews();
    }

    /**
     * Récupère tous les avis validés.
     * @return array Liste des avis validés.
     */
    public function getApprovedReviews(): array
    {
        return $this->avisRepository->getApprovedReviews();
    }

    /**
     * Valide un avis.
     * @param int $id Identifiant de l'avis.
     * @return bool Succès ou échec.
     */
    public function approveReview(int $id): bool
    {
        return $this->avisRepository->update($id, ['statut' => 1]);
    }

    /**
     * Supprime un avis.
     * @param int $id Identifiant de l'avis.
     * @return bool Succès ou échec.
     */
    public function deleteReview(int $id): bool
    {
        return $this->avisRepository->delete($id);
    }
}

