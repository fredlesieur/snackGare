<?php

namespace App\Repositories;

class AccueilRepository extends BaseRepository
{
    protected $table = 'accueil';

    public function createAccueil(array $data): int
    {
        try {
            $sql = "INSERT INTO {$this->table} (title, content, display_order) VALUES (?, ?, ?)";
            $this->req($sql, [
                $data['title'],
                $data['content'],
                $data['display_order']
            ]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            error_log("Erreur dans createAccueil : " . $e->getMessage());
            return 0;
        }
    }

    public function updateAccueil(int $id, array $data): bool
    {
        try {
            // Mise à jour des champs principaux
            $this->update($id, [
                'title' => $data['title'],
                'content' => $data['content'],
                'display_order' => $data['display_order'],
            ]);

            // Mise à jour des associations d'images
            if (!empty($data['image_ids'])) {
                $this->associateImages($id, $data['image_ids']);
            }

            return true;
        } catch (\Exception $e) {
            error_log("Erreur dans updateAccueil pour l'ID $id : " . $e->getMessage());
            return false;
        }
    }

    public function associateImages(int $accueilId, array $imageIds): bool
{
    try {
        error_log("Début de associateImages pour l'élément $accueilId.");
        error_log("Images à associer : " . print_r($imageIds, true));

        // Supprimer les anciennes associations
        $this->req("DELETE FROM accueil_images WHERE accueil_id = ?", [$accueilId]);
        error_log("Anciennes associations supprimées pour accueil_id : $accueilId");

        // Ajouter les nouvelles associations
        foreach ($imageIds as $imageId) {
            if (!empty($imageId)) { // Vérification simple pour éviter d'insérer des valeurs vides
                $this->req("INSERT INTO accueil_images (accueil_id, image_id) VALUES (?, ?)", [$accueilId, $imageId]);
                error_log("Association ajoutée : accueil_id = $accueilId, image_id = $imageId");
            }
        }

        error_log("Associations mises à jour avec succès pour l'élément $accueilId.");
        return true;
    } catch (\Exception $e) {
        error_log("Erreur dans associateImages : " . $e->getMessage());
        return false;
    }
}

    

    public function findAllWithImages(): array
    {
        try {
            $sql = "SELECT a.*, 
                           GROUP_CONCAT(i.url) AS image_urls,
                           GROUP_CONCAT(i.alt_text) AS image_alt_texts
                    FROM accueil a
                    LEFT JOIN accueil_images ai ON a.id = ai.accueil_id
                    LEFT JOIN images i ON ai.image_id = i.id
                    GROUP BY a.id
                    ORDER BY a.display_order ASC";
            return $this->req($sql)->fetchAll();
        } catch (\Exception $e) {
            error_log("Erreur dans findAllWithImages : " . $e->getMessage());
            return [];
        }
    }

    public function getImagesForAccueil(int $accueilId): array
    {
        try {
            $sql = "SELECT i.* FROM images i
                    INNER JOIN accueil_images ai ON i.id = ai.image_id
                    WHERE ai.accueil_id = ?";
            return $this->req($sql, [$accueilId])->fetchAll();
        } catch (\Exception $e) {
            error_log("Erreur dans getImagesForAccueil : " . $e->getMessage());
            return [];
        }
    }
}
