<?php

namespace App\Config;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    private $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
                'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
                'api_secret' => $_ENV['CLOUDINARY_API_SECRET']
            ]
        ]);
    }

    /**
     * Uploads a file to Cloudinary.
     *
     * @param string $filePath The path to the file to upload.
     * @param string $folder The folder in Cloudinary where the file will be stored.
     * @return string|false The secure URL of the uploaded file, or false on failure.
     */
    public function uploadFile(string $filePath, string $folder = 'default/')
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload($filePath, [
                'folder' => $folder,
                'resource_type' => 'image',
            ]);
            return $result['secure_url'];
        } catch (\Exception $e) {
            // Log the error for debugging
            error_log("Cloudinary upload error: " . $e->getMessage());
            echo "Cloudinary upload error: " . $e->getMessage(); 
            return false;
        }
    }

    public function deleteFile($publicId)
    {
        try {
            $this->cloudinary->uploadApi()->destroy($publicId);
            return true;
        } catch (\Exception $e) {
            error_log("Erreur de suppression Cloudinary : " . $e->getMessage());
            return false;
        }
    }
}
