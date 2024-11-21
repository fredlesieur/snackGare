<?php

namespace App\Controllers;

use App\Repositories\SectionRepository;
use App\Config\CloudinaryService;

class SectionController extends Controller
{
    private $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function add()
    {
        $this->render('dashboard/section/add'); // Affiche le formulaire
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $title = $_POST['title'] ?? null;
            $content = $_POST['content'] ?? null;

            if (!$title || !$content) {
                echo "Titre et contenu sont obligatoires.";
                return;
            }

            // Vérifier et uploader l'image
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $cloudinaryService = new CloudinaryService();
                $uploadedImageUrl = $cloudinaryService->uploadFile($_FILES['image']['tmp_name']);

                if ($uploadedImageUrl) {
                    // Appelle le repository pour insérer les données
                    $success = $this->sectionRepository->addSectionWithImage([
                        'title' => $title,
                        'content' => $content,
                        'image_url' => $uploadedImageUrl,
                    ]);

                    if ($success) {
                        header('Location: /dashboard/sections');
                        exit;
                    } else {
                        echo "Erreur lors de l'enregistrement.";
                    }
                } else {
                    echo "Échec de l'upload de l'image.";
                }
            } else {
                echo "Aucune image valide.";
            }
        }
    }
}
