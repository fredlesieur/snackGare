<?php

namespace App\Controllers;

use App\Repositories\AccueilRepository;
use App\Repositories\ImageRepository;
use App\Services\CloudinaryService;
use App\Utils\Redirect;

class AccueilController extends Controller
{
    protected $accueilRepository;

    public function __construct()
    {
        parent::__construct();
        $this->accueilRepository = new AccueilRepository();
    }

    public function list()
    {
        try {
            $elements = $this->accueilRepository->findAllWithImages();

            $this->render('dashboard/accueil/list', [
                'title' => 'Liste des éléments de la page d’accueil',
                'elements' => $elements,
            ], true);
        } catch (\Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue en récupérant la liste des éléments.";
            Redirect::to('/dashboard/index');
        }
    }

    public function add()
    {
        $imageRepo = new ImageRepository();
        $cloudinaryService = new CloudinaryService();

        try {
            $images = $imageRepo->findAll();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'title' => $_POST['title'] ?? '',
                    'content' => $_POST['content'] ?? '',
                    'display_order' => $_POST['display_order'] ?? 0,
                ];

                $uploadedImageIds = [];
                if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
                    $uploadedImageUrl = $cloudinaryService->uploadFile($_FILES['new_image']['tmp_name']);
                    if ($uploadedImageUrl) {
                        $imageId = $imageRepo->createImage(
                            $uploadedImageUrl,
                            pathinfo($_FILES['new_image']['name'], PATHINFO_FILENAME)
                        );
                        $uploadedImageIds[] = $imageId;
                    }
                }

                $selectedImageIds = $_POST['image_ids'] ?? [];
                $allImageIds = array_merge($selectedImageIds, $uploadedImageIds);

                $accueilId = $this->accueilRepository->createAccueil($data);
                if ($accueilId) {
                    $this->accueilRepository->associateImages($accueilId, $allImageIds);
                    $_SESSION['success'] = "Élément ajouté avec succès.";
                    Redirect::to('/accueil/list');
                } else {
                    $_SESSION['error'] = "Une erreur est survenue lors de l'ajout.";
                }
            }

            $this->render('dashboard/accueil/add', [
                'title' => 'Ajouter un élément',
                'images' => $images,
            ], true);
        } catch (\Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors de l'ajout d'un élément.";
            Redirect::to('/accueil/list');
        }
    }

   
    public function edit(int $id)
    {
        try {
            $element = $this->accueilRepository->find($id);
            if (!$element) {
                $_SESSION['flash_error'] = "Élément introuvable.";
                Redirect::to('/accueil/list');
            }
    
            // Récupérer toutes les images déjà uploadées dans ta bibliothèque
            $imageRepository = new ImageRepository();
            $images = $imageRepository->findAll();  // Récupère toutes les images de ta table `images`
    
            $selectedImages = $this->accueilRepository->getImagesForAccueil($id); // Récupérer les images associées à cet élément
            $selectedImagesIds = array_column($selectedImages, 'id'); // Extraire les IDs des images sélectionnées
    
            $this->render('dashboard/accueil/edit', [
                'title' => "Modifier un élément",
                'element' => $element,
                'images' => $images,
                'selectedImagesIds' => $selectedImagesIds,  // Passer les IDs des images sélectionnées
            ], true);
        } catch (\Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue en modifiant l'élément.";
            Redirect::to('/accueil/list');
        }
    }
    public function update(int $id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'title' => $_POST['title'] ?? null,
            'content' => $_POST['content'] ?? null,
            'display_order' => $_POST['display_order'] ?? null,
            'image_ids' => $_POST['image_ids'] ?? [], // Images sélectionnées
        ];

        // Vérifier que les image_ids existent dans la base de données
        $imageRepository = new ImageRepository();
        $data['image_ids'] = array_filter($data['image_ids'], function ($imageId) use ($imageRepository) {
            return $imageRepository->exists((int)$imageId);
        });

        if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedImage = $_FILES['new_image'];

            $cloudinaryService = new CloudinaryService();
            $imageUrl = $cloudinaryService->uploadFile($uploadedImage['tmp_name']);

            if ($imageUrl) {
                $newImageId = $imageRepository->createImage(
                    $imageUrl,
                    pathinfo($uploadedImage['name'], PATHINFO_FILENAME)
                );

                if ($newImageId) {
                    $data['image_ids'][] = $newImageId;
                }
            }
        }

        $result = $this->accueilRepository->updateAccueil($id, $data);

        if ($result) {
            $_SESSION['success'] = "Élément mis à jour avec succès.";
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour.";
        }

        Redirect::to('/accueil/list');
    } else {
        $_SESSION['error'] = "Méthode non autorisée.";
        Redirect::to('/accueil/list');
    }
}

    public function delete(int $id)
    {
        try {
            $success = $this->accueilRepository->delete($id);

            if ($success) {
                $_SESSION['flash_success'] = 'Élément supprimé avec succès.';
            } else {
                $_SESSION['flash_error'] = 'Une erreur est survenue lors de la suppression.';
            }

            Redirect::to('/accueil/list');
        } catch (\Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors de la suppression.";
            Redirect::to('/accueil/list');
        }
    }
}
