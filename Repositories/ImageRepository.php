<?php

namespace App\Repositories;

use App\Services\CloudinaryService;
use Exception;

class ImageRepository extends BaseRepository
{
    protected $table = 'images';
    
    // Déclaration de l'instance de CloudinaryService
    private $cloudinaryService;

    public function __construct()
    {
        parent::__construct();
        $this->cloudinaryService = new CloudinaryService();  // Initialisation de l'instance CloudinaryService
    }

    // Ajouter une image à la base de données
    public function addImage(?string $imageUrl, string $description): int
    {
        if (empty($imageUrl)) {
            throw new \Exception('L\'URL de l\'image est vide.');
        }
    
        // Prépare les données pour l'insertion
        $data = [
            'url' => $imageUrl,
            'alt_text' => $description,
        ];
    
        // Utilise `create()` pour insérer les données
        if ($this->create($data)) {
            // Retourne l'ID de l'image insérée
            return $this->db->lastInsertId();
        }
    
        throw new \Exception("Erreur lors de l'insertion de l'image.");
    }
    // Trouver une image par son texte alternatif (alt)
    public function findImageByAlt(string $altText): ?array
    {
        $result = $this->findBy(['alt_text' => $altText]);
        return $result ? $result[0] : null; // Retourne le premier résultat ou null
    }

    // Supprimer une image depuis Cloudinary en utilisant son public_id
    public function deleteImage(string $publicId): bool
    {
        // Appel au service Cloudinary pour supprimer l'image
        return $this->cloudinaryService->deleteFile($publicId);
    }

    public function getImageUrlById(int $imageId): ?string
    {
        $sql = "SELECT url FROM images WHERE id = :id";
        $stmt = $this->req($sql, ['id' => $imageId]);
        $result = $stmt->fetch();
        
        return $result ? $result['url'] : null;  // Retourne l'URL de l'image ou null si l'image n'existe pas
    }
}

