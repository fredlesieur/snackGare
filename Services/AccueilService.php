<?php

namespace App\Services;

use App\Repositories\AccueilRepository;

class AccueilService
{
    private $accueilRepository;

    public function __construct()
    {
        $this->accueilRepository = new AccueilRepository();
    }

    /**
     * Met à jour un élément, y compris les images associées.
     *
     * @param int $id L'ID de l'élément à mettre à jour.
     * @param array $data Les données à mettre à jour, y compris les IDs des images.
     * @return array Résultat de la mise à jour.
     */
    public function updateAccueil(int $id, array $data): array
    {
        // Vérification des champs obligatoires
        if (empty($data['title']) || empty($data['content']) || empty($data['display_order'])) {
            return [
                'success' => false,
                'message' => "Tous les champs sont requis."
            ];
        }

        try {
            // Mise à jour des données principales de l'élément
            $updateResult = $this->accueilRepository->updateAccueil($id, $data);

            // Gestion des images associées (si elles existent dans $data)
            if (!empty($data['image_ids'])) {
                $this->accueilRepository->associateImages($id, $data['image_ids']);
            }

            if ($updateResult) {
                return [
                    'success' => true,
                    'message' => "Élément et images mis à jour avec succès."
                ];
            }
        } catch (\Exception $e) {
            error_log("Erreur dans updateAccueil : " . $e->getMessage());
            return [
                'success' => false,
                'message' => "Une erreur est survenue lors de la mise à jour."
            ];
        }

        return [
            'success' => false,
            'message' => "Une erreur inconnue est survenue."
        ];
    }

    /**
     * Récupère un élément par son ID.
     *
     * @param int $id L'ID de l'élément.
     * @return array|false L'élément trouvé ou false si non trouvé.
     */
    public function getAccueilById(int $id): array|false
    {
        return $this->accueilRepository->find($id);
    }
}

