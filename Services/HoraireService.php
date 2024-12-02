<?php

namespace App\Services;

use App\Repositories\HoraireRepository;

class HoraireService
{
    private $horaireRepository;

    public function __construct()
    {
        $this->horaireRepository = new HoraireRepository();
    }

    // Récupérer tous les horaires
    public function getAllHoraires(): array
    {
        return $this->horaireRepository->findAll();
    }

    public function addHoraire(array $data): array
    {
        if (empty($data['jours'])) {
            return ['success' => false, 'message' => "Tous les champs sont requis."];
        }
    
        // Ajoute l'horaire dans la base de données
        $success = $this->horaireRepository->createHoraire($data);
    
        if ($success) {
            return ['success' => true, 'message' => "Horaire ajouté avec succès."];
        }
    
        return ['success' => false, 'message' => "Une erreur s'est produite lors de l'ajout de l'horaire."];
    }
    
    

    // Modifier un horaire
    public function getHoraireById(int $id): ?array
    {
        return $this->horaireRepository->find($id);
    }

    public function updateHoraire(int $id, array $data): array
    {
        // Validation des données
        if (empty($data['jours'])) {
            return ['success' => false, 'message' => "Le champ 'Jours' est obligatoire."];
        }
    
        // Vérifier si les horaires sont valides
        if ($data['opening_time_lunch'] && $data['closing_time_lunch'] && strtotime($data['opening_time_lunch']) >= strtotime($data['closing_time_lunch'])) {
            return ['success' => false, 'message' => "L'heure de fermeture du midi doit être après l'heure d'ouverture."];
        }
    
        if ($data['opening_time_dinner'] && $data['closing_time_dinner'] && strtotime($data['opening_time_dinner']) >= strtotime($data['closing_time_dinner'])) {
            return ['success' => false, 'message' => "L'heure de fermeture du soir doit être après l'heure d'ouverture."];
        }
    
        // Mise à jour dans la base de données via le repository
        if ($this->horaireRepository->updateHoraire($id, $data)) {
            return ['success' => true, 'message' => "Horaire mis à jour avec succès."];
        }
    
        return ['success' => false, 'message' => "Une erreur s'est produite lors de la mise à jour de l'horaire."];
    }

    // Supprimer un horaire
    public function deleteHoraire(int $id): array
    {
        $success = $this->horaireRepository->deleteHoraire($id);

        if ($success) {
            return ['success' => true, 'message' => "Horaire supprimé avec succès."];
        }

        return ['success' => false, 'message' => "Une erreur s'est produite lors de la suppression de l'horaire."];
    }
}

