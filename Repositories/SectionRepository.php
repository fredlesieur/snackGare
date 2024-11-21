<?php

namespace App\Repositories;

use App\Config\CloudinaryService;

class SectionRepository extends BaseRepository
{
    protected $table = 'sections';

    public function findByPageId(int $pageId): array
    {
        return $this->findBy(['page_id' => $pageId]);
    }

    public function addSectionWithImage(array $data): bool
    {
        // Étape 1 : Ajouter l'image dans la table `images`
        $imageModel = new BaseRepository();
        $imageModel->table = 'images';

        $imageId = $imageModel->create([
            'url' => $data['image_url'],
            'alt_text' => $data['title'], // Utiliser le titre comme texte alternatif
        ]);

        if (!$imageId) {
            return false;
        }

        // Étape 2 : Ajouter la section avec `image_id` dans `sections`
        return $this->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image_id' => $imageId,
        ]);
    }
}

    