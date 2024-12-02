<?php

namespace App\Repositories;

class ImageRepository extends BaseRepository
{
    protected $table = 'images';

    public function __construct()
    {
        parent::__construct();
        $this->table = 'images';
    }

    /**
     * Récupère le dernier ID inséré.
     */
    public function getLastInsertedId(): int
    {
        return (int)$this->db->lastInsertId();
    }

    /**
     * Crée une nouvelle image dans la base de données.
     *
     * @param string $url L'URL de l'image.
     * @param string $altText Le texte alternatif pour l'image.
     * @return int L'ID de l'image nouvellement créée.
     */
    public function createImage(string $url, string $altText): int
    {
        try {
            $sql = "INSERT INTO images (url, alt_text) VALUES (?, ?)";
            $this->req($sql, [$url, $altText]);
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            error_log("Erreur dans createImage : " . $e->getMessage());
            return 0;
        }
    }
    public function exists(int $imageId): bool
{
    $sql = "SELECT COUNT(*) FROM images WHERE id = ?";
    $result = $this->req($sql, [$imageId])->fetchColumn();
    return $result > 0;
}

}
