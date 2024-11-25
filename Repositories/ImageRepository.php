<?php

namespace App\Repositories;

class ImageRepository extends BaseRepository
{
    protected $table = 'images';

    public function addImage(string $url, string $altText): int | false
    {
        return $this->create([
            'url' => $url,
            'alt_text' => $altText,
        ]);
    }
    public function findImageByAlt(string $altText): ?array
    {
        $result = $this->findBy(['alt_text' => $altText]);
        return $result ? $result[0] : null; // Retourne le premier résultat ou null
    }
}
