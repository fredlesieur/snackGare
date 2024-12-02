<?php

namespace App\Controllers;

use App\Repositories\ImageRepository;
use App\Services\CloudinaryService;

class ImageController extends Controller
{
    private $imageRepository;
    private $cloudinaryService;

    public function __construct()
    {
        parent::__construct();
        $this->imageRepository = new ImageRepository();
        $this->cloudinaryService = new CloudinaryService();
    }

    public function list()
    {
        try {
            $images = $this->imageRepository->findAll();
            $this->render('dashboard/images/list', ['images' => $images], true);
        } catch (\Exception $e) {
            $_SESSION['flash_error'] = "Erreur lors de la récupération des images.";
            header('Location: /dashboard/index');
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['image']['tmp_name'])) {
                try {
                    $uploadedUrl = $this->cloudinaryService->uploadFile($_FILES['image']['tmp_name'], 'images/');
                    if ($uploadedUrl) {
                        $data = [
                            'url' => $uploadedUrl,
                            'alt_text' => $_POST['alt_text'] ?? ''
                        ];
                        $this->imageRepository->create($data);
                        $_SESSION['flash_success'] = "Image ajoutée avec succès.";
                    } else {
                        $_SESSION['flash_error'] = "Erreur lors de l'upload de l'image.";
                    }
                } catch (\Exception $e) {
                    $_SESSION['flash_error'] = "Une erreur est survenue lors de l'upload de l'image.";
                }
            } else {
                $_SESSION['flash_error'] = "Aucune image sélectionnée.";
            }
            header('Location: /image/list');
        } else {
            $this->render('dashboard/images/add', [], true);
        }
    }

    public function delete(int $id)
    {
        try {
            $image = $this->imageRepository->find($id);
            if ($image) {
                // Supprime l'image de Cloudinary
                $publicId = basename($image['url'], '.' . pathinfo($image['url'], PATHINFO_EXTENSION));
                $this->cloudinaryService->deleteFile($publicId);

                // Supprime l'entrée dans la base de données
                $this->imageRepository->delete($id);
                $_SESSION['flash_success'] = "Image supprimée avec succès.";
            } else {
                $_SESSION['flash_error'] = "Image introuvable.";
            }
        } catch (\Exception $e) {
            $_SESSION['flash_error'] = "Une erreur est survenue lors de la suppression de l'image.";
        }

        header('Location: /image/list');
    }
}
