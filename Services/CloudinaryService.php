<?php

namespace App\Services;

use Cloudinary\Cloudinary;  // Vérifie que tu as bien cette importation

class CloudinaryService
{
    private $cloudinary;

    public function __construct()
    {
        // Vérifie que la configuration de Cloudinary est correcte dans le .env
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
            ]
        ]);
    }

    public function uploadFile(string $filePath, string $folder = 'default/')
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload($filePath, [
                'folder' => $folder,
                'resource_type' => 'image',
            ]);
            return $result['secure_url'];  // Vérifie que la réponse contient bien l'URL sécurisée
        } catch (\Exception $e) {
            // Log error or output message
            error_log("Cloudinary upload error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteFile(string $publicId)
    {
        try {
            $this->cloudinary->uploadApi()->destroy($publicId);
            return true;
        } catch (\Exception $e) {
            error_log("Cloudinary deletion error: " . $e->getMessage());
            return false;
        }
    }

}

