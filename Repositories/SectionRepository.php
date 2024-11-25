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
    $imageRepository = new ImageRepository();

    $imageId = $imageRepository->addImage($data['image_url'], $data['title']);
    if (!$imageId) {
        return false;
    }

    return $this->create([
        'title' => $data['title'],
        'content' => $data['content'],
        'image_id' => $imageId,
    ]);
}

}

    